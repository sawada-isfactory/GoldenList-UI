// 縦棒グラフ
var renderColumnChart = (function (chartInfo) {
    var balloonText = "<span style='font-size:20px;'>[[value]]件</span> [[additional]]</span>";
    if (chartInfo.balloonText.bar.title) {
        balloonText = "<span style='font-size:16px;'>" + chartInfo.balloonText.bar.title + "( [[category]]):<br><span style='font-size:16px;'>[[value]]件</span> [[additional]]</span>"
    }
    var dataset = {
        "type": "serial",
        "addClassNames": true,
        "theme": "light",
        "fontFamily": "メイリオ",
        "balloon": {
            "adjustBorderColor": false,
            "horizontalPadding": 10,
            "verticalPadding": 0,
            "color": "#ffffff",
        },
        "dataProvider": chartInfo.dataProvider,
        //軸
        "valueAxes": [{
            "id": "bar",
            "axisAlpha": 0,
            "position": "left",
            'integersOnly' : true,
            "minimum":0
        }],
        "startDuration": 0,
        "graphs": [{
            //棒グラフ
            "alphaField": "alpha",
            "balloonText": balloonText,
            "fillAlphas": 1,
            "title": "Number",
            "type": "column",
            "valueField": "number",
            "dashLengthField": "dashLengthColumn",
            "valueAxis": "bar",
            "colorField": "color",
            "lineColor": "#fff"
        }],
        //horizon
        "categoryField": "item",
        "categoryAxis": {
            "gridPosition": "start",
            "axisAlpha": 0,
        },
        "export": {
            "enabled": true
        }
    };
    var chart = AmCharts.makeChart(chartInfo.keyName, dataset);
});


var renderMixChart = (function (chartInfo) {
    console.log(chartInfo)
    var balloonTextBar = "<span style='font-size:20px;'>[[value]]件</span> [[additional]]</span>";
    var balloonTextLine = "<span style='font-size:20px;'>[[value]]%</span> [[additional]]</span>";
    var horizonTitleBar = horizonTitleLine = "";

    if (chartInfo.balloonText.bar.title !== 'undefined') {
        balloonTextBar = "<span style='font-size:16px;'>" + chartInfo.balloonText.bar.title + "([[category]]):<br><span style='font-size:16px;'>[[value]]件</span> [[additional]]</span>";
        horizonTitleBar = chartInfo.balloonText.bar.title;
    }
    if (chartInfo.balloonText.line.title !== 'undefined') {
        balloonTextLine = "<span style='font-size:16px;'>" + chartInfo.balloonText.line.title + "([[category]]):<br><span style='font-size:16px;'>[[value]]%</span> [[additional]]</span>";
        horizonTitleLine = chartInfo.balloonText.line.title;
    }

    var dataset = {
        "type": "serial",
        "addClassNames": true,
        "theme": "light",
        "fontFamily": "メイリオ",
        "balloon": {
            "adjustBorderColor": false,
            "horizontalPadding": 10,
            "verticalPadding": 0,
            // "fillColor": "rgba(0, 0, 0, 1)",
            "color": "#ffffff",
        },
        "dataProvider": chartInfo.dataProvider,
        //軸
        "valueAxes": [
            {
                "id": "bar",
                "title": chartInfo.valueAxes.bar.title,
                "axisAlpha": 0,
                "position": "left",
                "baseValue": 0,
                "min": 0,
                "minimum":0,
                "integersOnly" : true,
            },
            //2軸目
            {
                "id": "line",
                "title": chartInfo.valueAxes.line.title,
                "axisAlpha": 1,
                "position": "right",
                "unit": "%",
                "minimum":0
                //"gridColor" : "#1b7b94"
            }],
        "startDuration": 0,
        "graphs": [{
            //棒グラフ
            "alphaField": "alpha",
            "balloonText": balloonTextBar,
            "fillAlphas": 1,
            "title": "Number",
            "type": "column",
            "valueField": "number",
            "dashLengthField": "dashLengthColumn",
            "valueAxis": "bar",
            "colorField": "color",
            "lineColor": "#e0e0e0"
        }, {
            //折れ線グラフ
            "id": "graph2",
            "balloonText": balloonTextLine,
            "bullet": "round",
            "lineThickness": 3,
            "bulletSize": 7,
            "bulletBorderAlpha": 1,
            "bulletColor": "#FFFFFF",
            "useLineColorForBulletBorder": true,
            "bulletBorderThickness": 3,
            "fillAlphas": 0,
            "lineAlpha": 1,
            "title": "Conversion Rate",
            "valueField": "rate",
            "dashLengthField": "dashLengthLine",
            "valueAxis": "line",
            "lineColor": "#1b7b94"
        }],
        //horizon
        "categoryField": "item",
        "categoryAxis": {
            "gridPosition": "start",
            "axisAlpha": 0,
            "tickLength": 0
        }, legend: {
            data: [
                {
                    title: horizonTitleBar,
                    color: "rgba(145, 193, 95, 1)",
                },
                {
                    title: horizonTitleLine,
                    color: "#1b7b94",
                    markerType: "circle"
                }],
            align: "center"
        },
        "export": {
            "enabled": true
        }
    };
    var chart = AmCharts.makeChart(chartInfo.keyName, dataset);
});

var renderPieChart = (function (chartInfo) {
    var balloonText = "<span style='font-size:20px;'>[[value]]件</span> [[additional]]</span>";

    if (chartInfo.balloonText.pie.title !== 'undefined') {
        balloonText = "<span style='font-size:12px;'>[[item]]" + chartInfo.balloonText.pie.title + ":<br><span style='font-size:12px;'>[[value]]</span> [[additional]]</span>";
    }

    var dataset = {
        "type": "pie",
        "labelText": "[[percents]]%",
        "theme": "light",
        "startDuration": 0,
        "dataProvider": chartInfo.dataProvider,
        "valueField": "litres",
        "colorField": "color",
        "titleField": "item",
        "balloon":{
            "fixedPosition":true
        },
        "balloonText": balloonText,
        legend: {
            "useGraphSettings": false,
            "valueText": "",
            "align" : "center",
            "divId" : "pieChartLegend"
        },
        "export": {
            "enabled": true
        }
    };
    var chart = AmCharts.makeChart(chartInfo.keyName, dataset);
});

var renderLoyalCustomerChart  = (function (chartInfo, graphId) {
    serialKeyName = "serialChart" + graphId;
    pieKyeName = "pieChart" + graphId;
    keyName = "graph" + graphId;
    
    // MixChart
    if (chartInfo[keyName][serialKeyName]['dataProvider'].length > 0) {
        var myChartInfo = chartInfo[keyName][serialKeyName];
        myChartInfo['keyName'] = serialKeyName;
        myChartInfo['valueAxes'] = {
            "bar" : {
                "title" :  "件数（件)"
            },
            "line" : {
                "title" :  "成約率（%）"    
            }
        };
        myChartInfo['balloonText'] = {
            "bar" : {
                "title" :  "件数"
            },
            "line" : {
                "title" :  "成約率"
            }
        };
        renderMixChart(myChartInfo);
    } else {
        $('#' + serialKeyName).append('<div>グラフなし</div>')
    }

    // PieChart
    if (chartInfo[keyName][pieKyeName]['dataProvider'].length > 0) {
        var myChartInfo = chartInfo[keyName][pieKyeName];
        myChartInfo['keyName'] = pieKyeName;
        myChartInfo['balloonText'] = {
            "pie" : {
                "title" :  chartInfo[keyName]['meta']['unit']
            }
        };
        renderPieChart(myChartInfo);
    }else {
        console.log('グラフなし')
        $('#' + pieKyeName).append('<div>グラフなし</div>')
    }
});

var renderAccuracyGraph  = (function (myGraphCount, graphCount) {
    var chart = AmCharts.makeChart("accuracyGraph2",{
        "type": "serial",
        "theme": "light",
        "marginRight": 0,
        "dataProvider": [{
            "title": "",
            "count": myGraphCount,/* 値変更の箇所 */
            "color": "#337ab7"
        }],
        "valueAxes": [{
            "autoGridCount": false,
            "axisAlpha": 0,
            "position": "left",
            "title": "",
            "maximum": graphCount,
            "minimum": 0,
            "gridCount": 10
        }],
        "startDuration": 0,
        "graphs": [{
            "fillColorsField": "color",
            "fillAlphas": 0.9,
            "lineAlpha": 0.2,
            "type": "column",
            "valueField": "count",
            "labelText": "[[value]]",
        }],
        "categoryField": "title",
        "categoryAxis": {
            "gridPosition": "start",
        },
        "export": {
            "enabled": true
        },
        "rotate": true,
        "columnWidth": 0.5,
        "marginRight": 25
    });
});
