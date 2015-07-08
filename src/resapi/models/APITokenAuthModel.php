<?php
/*******************************************************
 * Copyright (C) 2015 Muhammad Juan Akbar - All Rights Reserved
 * Written by Muhammad Juan Akbar <mail@mjuanakbar.info>, 07 2015
 *
 * APIKeyModel.php can not be copied and/or distributed without the express
 * permission of author.
 *******************************************************/

namespace resapi\models;

use Illuminate\Database\Eloquent\Model as Model;

class APITokenAuthModel extends Model{

    protected $table = 'api_auth';
    protected $primaryKey = 'id_auth';
} 