<?php

$modversion['name'] = _XF_XFJOBS_NAME;
$modversion['version'] = 1.0;
$modversion['description'] = _XF_XFJOBS_DESC;
$modversion['author'] = 'Arjen van Efferen (http://xoopsforge.mediacom4.net)';
$modversion['credits'] = 'The XOOPS Project';
$modversion['help'] = '';
$modversion['license'] = 'GPL';
$modversion['official'] = 0;
$modversion['image'] = 'images/xfjobs.png';
$modversion['dirname'] = 'xfjobs';

$modversion['templates'][1]['file'] = 'xfjobs_index.html';
$modversion['templates'][1]['description'] = '';
$modversion['templates'][2]['file'] = 'xfjobs_createjob.html';
$modversion['templates'][2]['description'] = '';
$modversion['templates'][3]['file'] = 'xfjobs_editjob.html';
$modversion['templates'][3]['description'] = '';
$modversion['templates'][4]['file'] = 'xfjobs_viewjob.html';
$modversion['templates'][4]['description'] = '';
$modversion['templates'][5]['file'] = 'xfjobs_editprofile.html';
$modversion['templates'][5]['description'] = '';
$modversion['templates'][6]['file'] = 'xfjobs_viewprofile.html';
$modversion['templates'][6]['description'] = '';
$modversion['templates'][7]['file'] = 'xfjobs_helpwanted-latest.html';
$modversion['templates'][7]['description'] = '';

// Sql file (must contain sql generated by phpMyAdmin or phpPgAdmin)
// All tables should not have any prefix!
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
// Tables created by sql file (without prefix!)
$modversion['tables'][0] = 'xf_people_job';
$modversion['tables'][1] = 'xf_people_job_category';
$modversion['tables'][2] = 'xf_people_job_status';
$modversion['tables'][3] = 'xf_people_skill';
$modversion['tables'][4] = 'xf_people_skill_inventory';
$modversion['tables'][5] = 'xf_people_skill_level';
$modversion['tables'][6] = 'xf_people_skill_year';

// Admin things
$modversion['hasAdmin'] = 0;

// Menu
$modversion['hasMain'] = 1;
