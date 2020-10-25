<?php
/**
 * SourceForge Jobs (aka Help Wanted) Board
 *
 * SourceForge: Breaking Down the Barriers to Open Source Development
 * Copyright 1999-2001 (c) VA Linux Systems
 * http://sourceforge.net
 *
 * @version   $Id: createjob.php,v 1.7 2003/12/10 20:01:32 jcox Exp $
 */
require_once '../../mainfile.php';

require_once 'language/english/people.php';
require_once XOOPS_ROOT_PATH . '/modules/xfmod/include/pre.php';
require_once XOOPS_ROOT_PATH . '/modules/xfmod/include/project_summary.php';
require_once XOOPS_ROOT_PATH . '/modules/xfmod/project/admin/project_admin_utils.php';
require_once XOOPS_ROOT_PATH . '/modules/xfjobs/people_utils.php';
$GLOBALS['xoopsOption']['template_main'] = 'xfjobs_createjob.html';

if (!isset($fromedit)) {
    $title = '';

    $category_id = 100;

    $description = '';
}

if ($group_id && '' != $group_id) {
    $group = &group_get_object($group_id);

    $perm = &$group->getPermission($xoopsUser);

    if (!$perm->isAdmin()) {
        redirect_header($GLOBALS['HTTP_REFERER'], 4, _XF_G_PERMISSIONDENIED . '<br>' . _LOCAL_XF_PRJ_NOTADMINTHISPROJECT);

        exit;
    }

    if ($group->isFoundry()) {
        define('_LOCAL_XF_PRJ_NOTADMINTHISPROJECT', _XF_COMM_NOTADMINTHISCOMM);

        define('_LOCAL_XF_PEO_CREATEJOBFORPROJECT', _XF_PEO_CREATEJOBFORCOMM);
    } else {
        define('_LOCAL_XF_PRJ_NOTADMINTHISPROJECT', _XF_PRJ_NOTADMINTHISPROJECT);

        define('_LOCAL_XF_PEO_CREATEJOBFORPROJECT', _XF_PEO_CREATEJOBFORPROJECT);
    }

    require XOOPS_ROOT_PATH . '/header.php';

    $content = people_header($group_id, $job_id);

    $content .= get_project_admin_header($group_id, $perm, $group->isProject());

    $content .= '
	    <H4>' . _LOCAL_XF_PEO_CREATEJOBFORPROJECT . '</H4>
            <P>' . _XF_PEO_STARTFILLINGINFIELDSBELOW . '<P>
	    <FORM ACTION="' . XOOPS_URL . '/modules/xfjobs/editjob.php" METHOD="POST">
	    <INPUT TYPE="HIDDEN" NAME="group_id" VALUE="' . $group_id . '">
	    <B>' . _XF_PEO_CATEGORY . ':</B><BR>' . people_job_category_box('category_id', $category_id) . '<P><B>' . _XF_PEO_SHORTDESCRIPTION . ':</B><BR>
		<INPUT TYPE="TEXT" NAME="title" VALUE="' . $title . '"SIZE="40" MAXLENGTH="60">
	    <P><B>' . _XF_PEO_LONGDESCRIPTION . ':</B><BR>
	    <TEXTAREA NAME="description" ROWS="10" COLS="60" WRAP="SOFT">' . $ts->displayTarea($description) . '</TEXTAREA>
		<P><INPUT TYPE="SUBMIT" NAME="add_job" VALUE="' . _XF_PEO_CONTINUE . '"></FORM>';

    $xoopsTpl->assign('content', $content);

    require XOOPS_ROOT_PATH . '/footer.php';
} else {
    redirect_header($GLOBALS['HTTP_REFERER'], 4, 'ERROR<br>No Group!');

    exit;
}
