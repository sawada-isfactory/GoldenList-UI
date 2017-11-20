var checkStatusUrl = null;
var statusCheckReady = false;
var setRequest = (function (url, param) {
    return {
        'url': url,
        'param': param,
    }
});

var setCheckStatusUrl = (function(url) {
    checkStatusUrl = url
});

(function () {
    'use strict';

    /* notification表示 */
    $('#createProject').on('click', function () {
        /*
         * 1秒かけてメッセージを表示
         */
        $('.alert').fadeIn(1000).delay(2000);
        // メッセージ内の×ボタンクリックでメッセージを非表示にする
        $('.alert .close').on('click', function () {
            $(this).parents('.alert').hide();
        });
    });

    /* コールリスト上限可視不可視チェックボックス */
    $('#limit').change(function () {
        if ($(this).is(':checked')) {
            $('.operator-input').prop('disabled', false);
        } else {
            $('.operator-input').prop('disabled', true);
        }
    });

    $('#callListDeleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);//モーダルを呼び出すときに使われたボタンを取得
        var id = button.data('whatever'); //data-whatever の値を取得
        var title = button.data('title');
        var modal = $(this);  //モーダルを取得
        modal.find('.modal-body-p').text('コールリスト[' + title + ']を削除してもよろしいですか。'); //モーダルのタイトルに値を表示
        modal.find('.modal-body input#deleteCallListId').val(id); //inputタグにも表示
    });

    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);//モーダルを呼び出すときに使われたボタンを取得
        var title = button.data('title');
        var modal = $(this);  //モーダルを取得
        modal.find('.modal-body-p').text('プロジェクト[' + title + ']を削除してもよろしいですか。'); //モーダルのタイトルに値を表示
    });

    // ステップの更新
    var updateStep = (function(result) {
        if (typeof(result) != 'object') {
            return;
        }
        if (typeof(result.result) == 'undefined') {
            return;
        }

        if (!result.result.toString().match(/^[0-9]+$/)) {
            return
        }
        var step = result.result.toString();
        var nextStep =  (result.result + 1).toString();
        $('.step' + step).removeClass('active');
        $('.step' + step).addClass('completed');
        $('.step' + nextStep).addClass('active');
        hideRunningModal(true);
    });

    $('#uploadStep1').click(function () {
        showRunningModal(true);
        var fd = new FormData($('form')[0]);
        requestUpdate(reqInfo.url.uploadStep1, fd, updateStep, 'コールリストを受け付けました');
        statusCheckReady = true;
    });

    $('#uploadStep4').click(function () {
        showRunningModal(true);
        var fd = new FormData($('form')[0]);
        requestUpdate(reqInfo.url.uploadStep4, fd, updateStep, '更新データを受け付けました');
        statusCheckReady = true;
    });

    $('#updateCaps').click(function () {
        statusCheckReady = false;
        showRunningModal(true);
        var data = {
            "cap_enable" : $('[name=cap_enable]').prop('checked'),
            "cv_target_number": $('[name=cv_target_number]').val(),
            "cap_wd_am": $('[name=cap_wd_am]').val(),
            "cap_wd_pm": $('[name=cap_wd_pm]').val(),
            "cap_wd_night": $('[name=cap_wd_night]').val(),
            "cap_hd_am": $('[name=cap_hd_am]').val(),
            "cap_hd_pm": $('[name=cap_hd_pm]').val(),
            "cap_hd_night": $('[name=cap_hd_night]').val()
        };
        $("#cv_target_number").html('');
        $("#cap_wd_am").html('');
        $("#cap_wd_pm").html('');
        $("#cap_wd_night").html('');
        $("#cap_hd_am").html('');
        $("#cap_hd_pm").html('');
        $("#cap_hd_night").html('');
        requestJsonUpdate(reqInfo.url.updateCaps, data, updateStep);
    });

    $('#deleteForm').click(function () {
        var fd = new FormData($('#deleteCallListForm')[0]);
        var cb = (function(reqBody){
            window.location.href = reqInfo.url.cb
        });
        requestUpdate(reqInfo.url.delete, fd, cb);
        $('#projectDeleteModal').modal('hide');
    });

    $('#deleteCallList').click(function () {
        var fd = new FormData($('#deleteCallListForm')[0]);
        var cb = (function(reqBody){
            $('.callListItem' + reqBody.get('id')).remove()
        });
        console.log($('input#deleteCallListId'));
        requestUpdate(reqInfo.url.deleteCallList, fd, cb);

        $('#callListDeleteModal').modal('hide');
    });

    var requestJsonUpdate = (function (url, reqBody, cb) {
        var reqBody = JSON.stringify(reqBody);
        $.ajax({
            type: "POST",
            url: url,
            data: reqBody,
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            },
            processData: false,
            contentType: 'application/json'
        }).done(function(data, textStatus) {
            if (typeof(cb) == 'function') {
                console.log(cb);
                cb(data);
            }
            alert('更新しました');
        }).fail(function(jqXHR, textStatus) {
            console.log(jqXHR);
            var errMsg = '更新に失敗しました。 ステータスコード : ' + jqXHR.status
            if (jqXHR.status == 400) {
                errMsg = '入力値が正しくありません。';
                if (typeof(jqXHR.responseText) == 'string') {
                    var errorJson = JSON.parse(jqXHR.responseText);
                    if (errorJson) {
                        console.log(errorJson)
                        if (typeof(errorJson.errors) == 'object') {
                            $.each(errorJson.errors, function(k,arr){
                                var appendMsg = '';
                                $.each(arr, function(j, v) {
                                    appendMsg = appendMsg + v + '<br>'
                                });
                                console.log(appendMsg);
                                console.log(k);
                                $('#' + k).html(appendMsg);
                            });
                        }
                    }
                }
            }
            errorModalShow(errMsg);
        });
     });

    var requestUpdate = (function (url, reqBody, cb, msg) {
        console.log(url);
        console.log(reqBody);
        if (typeof(msg) != 'string') {
            msg = '更新しました';
        }
        $.ajax({
            type: "POST",
            url: url,
            data: reqBody,
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            },
            processData: false,
            contentType: false,
            success: function (resp) {
                if (typeof(cb) == 'function') {
                    console.log(cb);
                    cb(reqBody);
                }
                console.log(resp)
                console.log(typeof(cb))
                alert(msg);
            },
            error: function (resp) {
                alert('更新に失敗しました');
            }
        });
    });

    /* プロジェクト名編集切り替え */
    $('#edit_button').click(function () {
        if (!$('#project_name').hasClass('on')) {
            $('#project_name').addClass('on');
            var txt = $('#project_name').text();
            $('#project_name').html('<input type="text" value="' + txt + '">');
            $('#project_name > input').focus().blur(function () {
                var inputVal = $(this).val();
                var defaultValue = this.defaultValue;
                if (inputVal === '') {
                    inputVal = defaultValue;
                };
                if (inputVal !== defaultValue) {
                    var reqBody = {};
                    reqBody[reqInfo.param] = inputVal
                    $.ajax({
                        type: "POST",
                        url: reqInfo.url.here,
                        data: reqBody,
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                        },
                        success: function (resp) {
                            console.log(resp)
                        },
                        error: function (resp) {
                            alert('更新に失敗しました');
                        }
                    });
                }
                $(this).parent().removeClass('on').text(inputVal);
            });
        };
    });
    
    //表示しているグラフのラベルをデフォルト表示
    $('#graphDisplayLabel span').css({'display': 'none'});

    // レポートダウンロード
    $('.reportDl').click(
        function(){
            console.log($(this).attr('href'));
            var url = $(this).attr('href')
            $.ajax({
                type: "GET",
                url: url,
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                }
            }).done(function(data, textStatus) {
                console.log(data);
                updateStep(data);
                location.href = url
            }).fail(function(jqXHR) {
                console.log(jqXHR);
                var errMsg = 'ダウンロードに失敗しました。 ステータスコード : ' + jqXHR.status
                if (jqXHR.status == 404) {
                    errMsg = '予測実行中です。終了までしばらくお待ちください';
                }
                errorModalShow(errMsg);
            });
            return false;
        }
    );

    // コールリストダウンロード
    $('.callListDlForm').click(
        function(){
            var url = $(this).parents('form').attr('action');
            var reqBody = $(this).parents('form').serialize();
            var reqForm = $(this).parents('form');
            $.ajax({
                type: "GET",
                url: url,
                data: reqBody,
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                }
            }).done(function(data, textStatus) {
                reqForm.submit();
            }).fail(function(jqXHR) {
                console.log(jqXHR);
                    var errMsg = 'ダウンロードに失敗しました。 ステータスコード : ' + jqXHR.status;
                    if (jqXHR.status == 404) {
                        errMsg = '予測実行中です。終了までしばらくお待ちください';
                    }
                    errorModalShow(errMsg);
            });
            return false;
        });
    // エラー用のモーダルを表示
    var errorModalShow = (function(msg) {
        var errMsg = 'エラーが発生しました。';
        if (typeof(msg) == 'string') {
            errMsg = msg;
        }
        $('#modalErrMsg').html(errMsg);
        $('#errorModal').show();

    });

    // ステータス確認
    var reqCheckStatus = function(checkStatusUrl) {
        if (statusCheckReady == false) {
            return;
        }
        $.ajax({
            type: "GET",
            url: checkStatusUrl,
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            }
        }).done(function(data, textStatus) {
            console.log(data);
            if (data.result == 'OK') {
                $('#completeModal').show();
                hideRunningModal(false);
            } else {
                showRunningModal(false);
            }
        }).fail(function(jqXHR) {
            hideRunningModal(false);
            statusCheckReady = false;
            var errMsg = '予測処理中にエラーが発生しました。お問い合わせください。';
            errorModalShow(errMsg);
        });
    };

    var checksetStatusURl = function() {
        if (checkStatusUrl !== null) {
            console.log('checkStatus')
            statusCheckReady = true;
            checkStatus();
        } else {
            setTimeout(function() {checksetStatusURl()},1000);
        }
    };

    var checkStatus = function() {
        reqCheckStatus(checkStatusUrl);
        setTimeout(function() {checkStatus()},15000);
    };

    var showRunningModal = function(changeCheckReady) {
        if (changeCheckReady == true) {
            statusCheckReady = false;
        }
        $('.goldenModal').show();
    };

    var hideRunningModal = function(changeCheckReady) {
        if (changeCheckReady == true) {
            statusCheckReady = true;
        }
        $('.goldenModal').hide();
    };

    checksetStatusURl();

    $('.errClose').click(function(){$('#errorModal').hide()});

    $('#chkAllGoldenListCsv').on('change', function(){$('.chkGoldenListCsv').prop('checked', this.checked)});
    $('.chkGoldenListCsv').on('change',
        function(){
            if ($('#chkGoldenListCsvs :checked').length == $('#chkGoldenListCsvs :input').length){
                $('#chkAllGoldenListCsv').prop('checked', 'checked');
            }else{
                $('#chkAllGoldenListCsv').prop('checked', false);
            }
    });


})();
