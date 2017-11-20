<?php
namespace GoldenList\Lib;

/**
 * BodaisEngineApi
 */
class DemoUtility
{

    /**
     * @return mixed
     */
    public function isDemoEnable()
    {
        return GOLDENLIST_DEMO['enable'];
    }


    /**
     * @param $projectName
     * @return bool
     */
    public function isDemoProj($projectName)
    {
        $demoPrefix = GOLDENLIST_DEMO['project_prefix'];
        if (preg_match('/^' . $demoPrefix . '/', $projectName)) {
            return true;
        }
        return false;
    }

    /**
     * デモユーザー確認
     * @return bool
     */
    public function isDemoUser($groupId)
    {
        if (in_array($groupId, GOLDENLIST_DEMO['group_ids'])) {
            return true;
        }
        return false;
    }

    public function isDemoMode($groupId)
    {
        return $this->isDemoEnable() && $this->isDemoUser($groupId);
    }
}
