<?php
require_once('config.php');
require_once('session.php');
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css">
        <style>
        .sidebar-expanded .list-group-item {
            border: none;
        }

        .sidebar-collapsed .list-group-item {
            border: none;
        }
        </style>
    </head>

    <body>
        <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
            <ul class="list-group">
                <a href="#submenu1" data-toggle="collapse" aria-expanded="false"
                    class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <span class="fa fa-dashboard fa-fw mr-3"></span>
                    <span class="menu-collapsed">Dashboard</span>
                    <span class="submenu-icon ml-auto"></span>
                </a>
                <?php if ($_SESSION['status'] == 2): ?>
                <a href="listar_medico.php"
                    class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <span><i class="bi bi-heart-pulse fs-5"></i></span>
                    <span class="fa fa-user fa-fw mr-3"></span>
                    <span class="menu-collapsed">Médicos</span>
                </a>
                <a href="listar_paciente.php"
                    class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <span><i class="bi bi-people-fill fs-5"></i></span>
                    <span class="fa fa-user fa-fw mr-3"></span>
                    <span class="menu-collapsed">Pacientes</span>
                </a>
                <a href="cadastrar_funcionario.php"
                    class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <span><i class="bi bi-person-vcard-fill fs-5"></i></span>
                    <span class="fa fa-user fa-fw mr-3"></span>
                    <span class="menu-collapsed">Funcionários</span>
                </a>
                <a href="marcar_consulta.php" class="bg-dark list-group-item list-group-item-action">
                    <span><i class="bi bi-calendar-month fs-5"></i></span>
                    <span class="fa fa-tasks fa-fw mr-3"></span>
                    <span class="menu-collapsed">Marcar Consulta</span>
                </a>
                <a href="cadastro_procedimento.php" class="bg-dark list-group-item list-group-item-action">
                    <span><i class="bi bi-bandaid fs-5"></i></span>
                    <span class="fa fa-calendar fa-fw mr-3"></span>
                    <span class="menu-collapsed">Procedimentos</span>
                </a>
                <?php endif; ?>
                <a href="buscar_consultas.php" class="bg-dark list-group-item list-group-item-action">
                    <span><i class="bi bi-calendar-check fs-5"></i></span>
                    <span class="fa fa-envelope-o fa-fw mr-3"></span>
                    <span class="menu-collapsed">Consultas <span
                            class="badge badge-pill badge-primary ml-2">5</span></span>
                </a>
                <a href="buscar_exames.php" class="bg-dark list-group-item list-group-item-action">
                    <span><i class="bi bi-ui-checks fs-5"></i></span>
                    <span class="fa fa-question fa-fw mr-3"></span>
                    <span class="menu-collapsed">Exames</span>
                </a>
                <a href="#top" data-toggle="sidebar-colapse"
                    class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                    <span><i class="bi bi-arrow-left-right fs-5"></i></span>
                    <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                    <span id="collapse-text" class="menu-collapsed">Collapse</span>
                </a>
            </ul>
        </div>

        <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Hide submenus
            document.querySelectorAll('#body-row .collapse').forEach(function(collapse) {
                collapse.classList.remove('show');
            });

            // Collapse/Expand icon
            var collapseIcon = document.getElementById('collapse-icon');
            collapseIcon.classList.add('fa-angle-double-left');

            // Collapse click
            document.querySelectorAll('[data-toggle="sidebar-colapse"]').forEach(function(element) {
                element.addEventListener('click', function() {
                    SidebarCollapse();
                });
            });

            function SidebarCollapse() {
                var menuCollapsedItems = document.querySelectorAll('.menu-collapsed');
                var sidebarSubmenus = document.querySelectorAll('.sidebar-submenu');
                var submenuIcons = document.querySelectorAll('.submenu-icon');
                var sidebarContainer = document.getElementById('sidebar-container');

                menuCollapsedItems.forEach(function(element) {
                    element.classList.toggle('d-none');
                });
                sidebarSubmenus.forEach(function(element) {
                    element.classList.toggle('d-none');
                });
                submenuIcons.forEach(function(element) {
                    element.classList.toggle('d-none');
                });
                sidebarContainer.classList.toggle('sidebar-expanded');
                sidebarContainer.classList.toggle('sidebar-collapsed');

                // Treating d-flex/d-none on separators with title
                var separatorTitles = document.querySelectorAll('.sidebar-separator-title');
                separatorTitles.forEach(function(separatorTitle) {
                    separatorTitle.classList.toggle('d-flex');
                });

                // Collapse/Expand icon
                if (sidebarContainer.classList.contains('sidebar-collapsed')) {
                    collapseIcon.classList.remove('fa-angle-double-left');
                    collapseIcon.classList.add('fa-angle-double-right');
                } else {
                    collapseIcon.classList.remove('fa-angle-double-right');
                    collapseIcon.classList.add('fa-angle-double-left');
                }
            }
        });
        </script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>
    </body>