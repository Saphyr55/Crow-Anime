<?php
                if (!isset($_SESSION["user"]) || !($_SESSION["user"]->isAdmin())) {
                    header("Location: http://$_SERVER[HTTP_HOST]/not-found");
                    exit;
                }
                ?>