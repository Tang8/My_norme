<?php
# @Author: tang_g/phetsi_w
# @Date:   2017-01-03T16:32:42+01:00
# @Filename: loader.php
# @Last modified by:   tang_g
# @Last modified time: 2017-01-04T16:27:37+01:00

require_once('initiator.php');

function roulinette($directory){
    title();
    files_scan(files_get($directory));
    credit();
}

function title() {
    if(rand(0, 1000) === 42){
        // Uncensored version
        echo "    \.
      \'.      ;.
       \ '. ,--''-.~-~-'-, \e[91m
        \,-' ,-.   '.~-~-~~, \e[92m
      ,-'   (###)    \-~'~=-. \e[93m
  _,-'       '-'      \=~-\"~~',             _                           \e[94m
 /o                    \~-\"\"~=-,         _ | |   ___    _ _     __ _   \e[95m
 \__                    \=-,~\"-~,       | || |  / -_)  | ' \   / _` |   \e[96m
    \"\"\"===-----.         \~=-\"~-.       _\__/   \___|  |_||_|  \__,_| \e[91m
                \         \*=~-\"      _|\"\"\"\"\"|_|\"\"\"\"\"|_|\"\"\"\"\"|_|\"\"\"\"\"|_ \e[92m
                 \         \"=====---- \"`-0-0-'\"`-0-0-'\"`-0-0-'\"`-0-0-'\" \e[93m
                  \ \e[0m
                   \                      Built for Jema's happiness.\n\n";
    } else {
        echo "               _ \e[91m
            _ | |   ___    _ _     _  _\e[92m
           | || |  / -_)  | ' \   / _` |\e[93m
           _\__/   \___|  |_||_|  \__,_|\e[94m
         _|\"\"\"\"\"|_|\"\"\"\"\"|_|\"\"\"\"\"|_|\"\"\"\"\"|_\e[95m
         \"`-0-0-'\"`-0-0-'\"`-0-0-'\"`-0-0-'\"\e[0m
            Built for Jema's happiness.\n\n";
    }
}

function uncensored_title() {

}

function credit() {
    echo "               ||| |||| | ||||| |||
               666 3242 9 58170 404
                  Made in CHINA\n
";
}
