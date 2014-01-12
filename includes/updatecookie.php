<?php
// Xenobe Rage Copyright (C) 2012-2013 David Dawson
// Blacknova Traders -  Copyright (C) 2001-2012 Ron Harwood and the BNT development team
//
//  This program is free software: you can redistribute it and/or modify
//  it under the terms of the GNU Affero General Public License as
//  published by the Free Software Foundation, either version 3 of the
//  License, or (at your option) any later version.
//
//  This program is distributed in the hope that it will be useful,
//  but WITHOUT ANY WARRANTY; without even the implied warranty of
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//  GNU Affero General Public License for more details.
//
//  You should have received a copy of the GNU Affero General Public License
//  along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
// File: includes/updatecookie.php

if (preg_match("/updatecookie.php/i", $_SERVER['PHP_SELF'])) {
      echo "You can not access this file directly!";
      die();
}

function updatecookie ()
{
    // Refresh the cookie with username/password - Times out after 60 mins, and player must login again.
    global $gamepath, $gamedomain, $userpass, $username, $password;

    // The new combined cookie login.
    $userpass = $username."+".$password;
    setcookie("userpass", $userpass, time()+(3600*24)*365, $gamepath, $gamedomain);
    if ($userpass != '' and $userpass != '+')
    {
        $username = substr ($userpass, 0, strpos ($userpass, "+"));
        $password = substr ($userpass, strpos ($userpass, "+")+1);
    }
}
?>
