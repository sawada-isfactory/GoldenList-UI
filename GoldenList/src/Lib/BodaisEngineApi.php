<?php
namespace GoldenList\Lib;

use Cake\Log\Log;
use Cake\Core\Configure;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\InternalErrorException;
use Cake\Network\Http\Client;
use Cake\Network\Exception\NotFoundException;

/**
 * BodaisEngineApi
 */
class BodaisEngineApi
{
    public function postInsert($request)
    {
        $result = $this->requestPostWithFile('insert',
            $request['fileInfo']['tmp_name'], [
                'callListId' => $request['callListId'],
                'filename' => $request['fileInfo']['name'],
                'isSampling' => $request['isSampling'],
            ]);
        return ['filename' => $request['fileInfo']['name']];
    }

    public function postInsertGoldenList($request)
    {
        $result = $this->requestPostWithFile('insertGoldenList', $request['fileInfo']['tmp_name'], ['callListId' => $request['callListId'], 'filename' => $request['fileInfo']['name']]);
        return ['filename' => $request['fileInfo']['name']];
    }

    public function copyCallList($orgCallListId, $callListId, $copyNumber)
    {
        $http = new Client();
        $url = GOLDENLIST_ENGINE_API_URL . DS . 'copyCallList';
        $response = $http->post($url, compact('orgCallListId','callListId','copyNumber'));
        if (!$response->isOk()) {
            if ($response->statusCode() == 404) {
                throw new NotFoundException();
            }
            throw new InternalErrorException(sprintf("[%s]%s", $response->statusCode(), $response->body()));
        }
        return true;

    }

    public function createScore($params)
    {
        $apiInfo = ['apiUrl' => GOLDENLIST_ENGINE_API_URL];
        $url = $apiInfo['apiUrl'] . DS . 'createScore';
        $http = new Client();
        $response = $http->post($url, ['callListId' => $params['callListId']], [
            'timeout' => GOLDENLIST_API_TIMEOUT //set timeout to 2 mins.
        ]);
        if (!$response->isOk()) {
            throw new InternalErrorException(sprintf("[%s]%s", $response->statusCode(), $response->body()));
        }
        ////Log::error($response->isOk());
        return true;
    }

    private function requestPostWithFile($endpoint, $path, $params = [])
    {
        $apiInfo = ['apiUrl' => GOLDENLIST_ENGINE_API_URL];

        $url = $apiInfo['apiUrl'] . DS . $endpoint;

        ////Log::error(compact('url', 'path'));

        $requestParam = array_merge(['file' => fopen($path, 'r')], $params);
        ltrim($path, '@');
        $http = new Client();
        $response = $http->post($url, $requestParam, [
            'timeout' => GOLDENLIST_API_TIMEOUT //set timeout to 2 mins.
        ]);
        if (!$response->isOk()) {
            throw new InternalErrorException(sprintf("[%s]%s", $response->statusCode(), $response->body()));
        }

        return true;
    }

    public function checkCanDownloadReport($params)
    {
        $http = new Client();
        $url = GOLDENLIST_DOWNLOAD_API_URL . DS . 'checkReport';
        $response = $http->post($url, $params);
        if (!$response->isOk()) {
            if ($response->statusCode() == 404) {
                throw new NotFoundException();
            }
            throw new InternalErrorException(sprintf("[%s]%s", $response->statusCode(), $response->body()));
        }
        return true;
    }

    public function checkCanDownloadCallLists($params)
    {
        $http = new Client();
        $url = GOLDENLIST_DOWNLOAD_API_URL . DS . 'checkCallLists';
        $response = $http->post($url, $params);
        if (!$response->isOk()) {
            if ($response->statusCode() == 404) {
                throw new NotFoundException();
            }
            throw new InternalErrorException(sprintf("[%s]%s", $response->statusCode(), $response->body()));
        }
        return true;
    }


    public function checkCanDownloadGoldenLists($params)
    {
        $http = new Client();
        $url = GOLDENLIST_DOWNLOAD_API_URL . DS . 'checkGoldenLists';
        $response = $http->post($url, $params);
        if (!$response->isOk()) {
            if ($response->statusCode() == 404) {
                throw new NotFoundException();
            }
            throw new InternalErrorException(sprintf("[%s]%s", $response->statusCode(), $response->body()));
        }
        return true;
    }

    public function regenerateReport($params)
    {
        $http = new Client();
        $url = GOLDENLIST_DOWNLOAD_API_URL . DS . 'regenerateReport';
        $response = $http->post($url, $params);
        if (!$response->isOk()) {
            if ($response->statusCode() == 400) {
                throw new BadRequestException();
            }
            throw new InternalErrorException(sprintf("[%s]%s", $response->statusCode(), $response->body()));
        }
        return $response->body();
    }

    public function downloadReport($params)
    {
        $http = new Client();
        $url = GOLDENLIST_DOWNLOAD_API_URL . DS . 'report';
        $response = $http->post($url, $params);
        if (!$response->isOk()) {
            if ($response->statusCode() == 404) {
                throw new NotFoundException();
            }
            throw new InternalErrorException(sprintf("[%s]%s", $response->statusCode(), $response->body()));
        }
        return $response->body();
    }

    public function downloadCallLists($params)
    {
        $http = new Client();
        $url = GOLDENLIST_DOWNLOAD_API_URL . DS . 'callLists';
        $response = $http->post($url, $params);
        if (!$response->isOk()) {
            if ($response->statusCode() == 404) {
                throw new NotFoundException();
            }
            throw new InternalErrorException(sprintf("[%s]%s", $response->statusCode(), $response->body()));
        }
        return $response->body();
    }

    public function downloadGoldenLists($params)
    {
        $http = new Client();
        $url = GOLDENLIST_DOWNLOAD_API_URL . DS . 'goldenLists';
        $response = $http->post($url, $params);
        if (!$response->isOk()) {
            if ($response->statusCode() == 404) {
                throw new NotFoundException();
            }
            throw new InternalErrorException(sprintf("[%s]%s", $response->statusCode(), $response->body()));
        }
        return $response->body();
    }

    public function checkEngineStatuses($masterProjectId)
    {
        $http = new Client();
        $url = GOLDENLIST_ENGINE_API_URL . DS . 'checkStatuses';
        $response = $http->get($url, ['master_project_id' => $masterProjectId]);
        if (!$response->isOk()) {
            if ($response->statusCode() == 404) {
                throw new NotFoundException();
            }
            throw new InternalErrorException(sprintf("[%s]%s", $response->statusCode(), $response->body()));
        }

        if ($result = @json_decode($response->body(), true)) {
            return $result['result'];
        }
        return null;
    }

    public function checkEngineStatus($masterCallListId)
    {
        $http = new Client();
        $url = GOLDENLIST_ENGINE_API_URL . DS . 'checkStatus';
        $response = $http->get($url, ['master_call_list_id' => $masterCallListId]);
        if (!$response->isOk()) {
            Log::error(sprintf("checkStatus ServerErr %s master_call_list_id = %s code = %s", $url, $masterCallListId, $response->statusCode()));
            if ($response->statusCode() == 404) {
                throw new NotFoundException();
            }
            throw new InternalErrorException(sprintf("[%s]%s", $response->statusCode(), $response->body()));
        }

        $resultJson = $response->body();

        if ($result = @json_decode($resultJson, true)) {
            return $result['result'];
        }
        return null;
    }

    public function isStatusError($engineResult)
    {
        if (!empty($engineResult['is_error'])) {
            return true;
        }
        return false;
    }

    public function isStatusRunning($engineResult)
    {
        // 何もしてない
        if (empty($engineResult)) {
            return false;
        }

        // ファイルアップロードのみ
        //if ($engineResult['status'] == GOLDENLIST_ENGINE_FILE_UPLOAD_STATUS &&
        //    empty($engineResult['end_time_datetime'])) {
        //    return false;
        //}

        // 完了してない
        if ($engineResult['status'] != GOLDENLIST_ENGINE_COMPLETE_STATUS) {
            return true;
        }
        return false;
    }

}
