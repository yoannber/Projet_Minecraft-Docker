<?php
/*
This file is part of Minecraft-RCON-Console.

    Minecraft-RCON-Console is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Minecraft-RCON-Console is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Minecraft-RCON-Console.  If not, see <http://www.gnu.org/licenses/>.
*/

$serverName = "My Server";

$gg = getenv('PROJECT_NAME');
$ggMoc = $gg."_minecraft_1";
$rconHost = $ggMoc;
$rconPort = getenv('EXPOSED_PORT_2');
$rconPassword = "2442";

require(__DIR__ . "/authsys.php");
?>