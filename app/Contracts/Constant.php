<?php

namespace App\Contracts;

/**
 * Contant used for default
 *
 *  Ken
 */
interface Constant
{
    // Role
    const ROLE_SUPER_ADMIN = 1;
    const ROLE_COMMON = 2;
    const ROLE_ADS = 3;

    //Marital
    const MARRIED = 1;
    const SINGLE = 0;

    //Sex
    const MALE = 1;
    const FEMALE = 0;

    //Job
    const JOB_PENDING = 0;
    const JOB_PENDED_SUCCESSFUL = 1;
    const JOB_EMPTY = 0;
    const JOB_FILLED = 1;

    const JOB_TYPE = [
        "FULL_TIME" => 3,
        "PART_TIME" => 4,
        "FREELANCE" => 5,
        "INTERNSHIP" => 6,
        "REMOTE" => 7,
        ];

    // Education degree
    const BACHELOR = 1;
    const MASTER = 2;
    const DOCTOR = 3;

    //Resume
    const SHOW = 1;
    const HIDE = 0;
    const RESUME_STATUS = [
        "NEW" => 3,
        "CONTACTED" => 4,
        "INTERVIEWED" => 5,
        "HIRED" => 6,
        "ARCHIVED" => 7,
    ];

}