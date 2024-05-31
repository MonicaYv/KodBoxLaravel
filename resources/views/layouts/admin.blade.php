<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" />
    <style>
        .sidebar {
            transition: transform 0.3s ease;
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }

        @media (min-width: 1024px) {
            .sidebar.hidden {
                transform: translateX(0);
            }
        }

        .bg-custom-white {
            background: #D9D9D9;
        }

        .hover-color-custom-yellow:hover {
            color: #FDCF01;
        }

        .footer-vertical {
            background-image: url(./images/footer-vertical-icon.png);
            background-size: cover;
            background-position: center;
        }

        .sidebar-bg {
            background-image: url(./images/sidebar-bg.svg);
            background-size: cover;
            background-position: center;
        }

        .bg-custom-light {
            background-color: #DBD7D7;
        }

        .arrow-rotate {
            transition: transform 0.3s ease-in-out;
        }

        .arrow-down {
            transform: rotate(90deg);
            padding-top: 4px;
        }

        .active {
            background-color: #FDCF01;
            color: black;
        }
    </style>
</head>

<body>

    <div class="setting-users-admin-wrapper bg-gray-100 flex flex-col h-screen">
        <!-- Sidebar Toggle Button -->
        <span class="absolute text-white text-4xl top-5 left-4 cursor-pointer lg:hidden" onclick="openSidebar()">
            <i class="bi bi-filter-left px-2 bg-gray-900 rounded-r-md"></i>
        </span>

        <!-- Sidebar -->
        <div class="sidebar-bg w-64 lg:w-1/6 h-screen bg-custom-white text-white flex flex-col sidebar fixed top-0 bottom-0 lg:left-0 overflow-y-auto text-center hidden lg:block">
            <div class="text-gray-100 text-xl">
                <div class="p-2.5 mt-1 flex items-center">
                    <img class="ml-3" width="96" height="90" src="./images/dots-logo.svg"></img>
                    <i class="bi bi-x cursor-pointer ml-auto lg:hidden" onclick="openSidebar()"></i>
                </div>
                <div class="my-2 bg-gray-600 h-[1px]"></div>
            </div>

            <div class="p-2.5 mt-3 flex items-center rounded-r-md px-4 mt-5 duration-300 cursor-pointer hover:bg-gray-900 text-black hover-color-custom-yellow" onclick="setActive(this)">
                <a href="./404.html"><span class="text-[15px] ml-4">Overview</span></a>
            </div>

            <div class="p-2.5 mt-3 flex items-center rounded-r-md px-4 duration-300 cursor-pointer hover:bg-gray-900 text-black hover-color-custom-yellow" onclick="setActive(this)">
                <div class="flex justify-between w-full items-center relative">
                    <a href="./system-setting.html" target="content-frame" class="flex items-center w-full">
                        <span class="text-[15px] ml-4">System Settings</span>
                        <span class="text-sm absolute right-0">
                            <i class="bi bi-chevron-right"></i>
                        </span>
                    </a>
                </div>
            </div>

            <div class="admin-wrapper">
                <div class="p-2.5 mt-3 flex items-center rounded-r-md px-4 duration-300 cursor-pointer hover:bg-gray-900 text-black hover-color-custom-yellow" onclick="setActive(this); dropdown('submenu-admin', 'arrow-admin')">
                    <div class="flex justify-between w-full items-center">
                        <span class="text-[15px] ml-4">Admin & Users</span>
                        <span class="text-sm transform" id="arrow-admin">
                            <i class="bi bi-chevron-right"></i>
                        </span>
                    </div>
                </div>

                <div class="text-left text-sm mx-auto hidden bg-custom-light rounded-r-md" id="submenu-admin">
                    <h4 class="relative cursor-pointer p-2 pl-4 text-black hover:bg-gray-900 rounded-r-md flex justify-between w-full items-center hover-color-custom-yellow" onclick="setActive(this)">
                        <a href="{{ route('usergroups') }}" target="content-frame" class="flex items-center w-full">
                            <span class="text-[15px] ml-4">Users and Groups</span>
                            <span class="text-sm rotate-180 absolute right-4">
                                <i class="bi bi-chevron-right"></i>
                            </span>
                        </a>
                    </h4>

                    <h4 class="relative cursor-pointer p-2 pl-4 text-black hover:bg-gray-900 rounded-r-md flex justify-between w-full items-center hover-color-custom-yellow" onclick="setActive(this)">
                        <a href="{{ route('rolesadmin') }}" target="content-frame">
                            <span class="text-[15px] ml-4">Role</span>
                            <span class="text-sm rotate-180 absolute right-4">
                                <i class="bi bi-chevron-right"></i>
                            </span>
                        </a>
                    </h4>

                    <h4 class="relative cursor-pointer p-2 pl-4 text-black hover:bg-gray-900 rounded-r-md flex justify-between w-full items-center hover-color-custom-yellow" onclick="setActive(this)">
                        <a href="{{ route('permissionsadmin') }}" target="content-frame" class="flex items-center w-full">
                            <span class="text-[15px] ml-4">Document Description</span>
                            <span class="text-sm rotate-180 absolute right-4">
                                <i class="bi bi-chevron-right"></i>
                            </span>
                        </a>
                    </h4>
                </div>
            </div>

            <div class="storage-files-wrapper">
                <div class="p-2.5 mt-3 flex items-center rounded-r-md px-4 duration-300 cursor-pointer hover:bg-gray-900 text-black hover-color-custom-yellow" onclick="setActive(this); dropdown('submenu-storage-file', 'arrow-storage-file')">
                    <div class="flex justify-between w-full items-center">
                        
                        <a href="./404.html" target="content-frame" class="flex items-center w-full">
                            <span class="text-[15px] ml-4">Storage / Files</span>
                            <span class="text-sm rotate-180 absolute right-4">
                                <i class="bi bi-chevron-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-2.5 mt-3 flex items-center rounded-r-md px-4 duration-300 cursor-pointer hover:bg-gray-900 text-black hover-color-custom-yellow" onclick="setActive(this)">
                
                <a href="./404.html" target="content-frame" class="flex items-center w-full">
                    <span class="text-[15px] ml-4">Plugin Center</span>
                    <span class="text-sm rotate-180 absolute right-4">
                        <i class="bi bi-chevron-right"></i>
                    </span>
                </a>
            </div>

            <div class="safety-control-wrapper">
                <div class="p-2.5 mt-3 flex items-center rounded-r-md px-4 duration-300 cursor-pointer hover:bg-gray-900 text-black hover-color-custom-yellow" onclick="setActive(this); dropdown('submenu-safety-control', 'arrow-safety-control')">
                    <div class="flex justify-between w-full items-center">
                        
                        <a href="./404.html" target="content-frame" class="flex items-center w-full">
                            <span class="text-[15px] ml-4">Safety Control</span>
                            <span class="text-sm rotate-180 absolute right-4">
                                <i class="bi bi-chevron-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="server-control-wrapper">
                <div class="p-2.5 mt-3 flex items-center rounded-r-md px-4 duration-300 cursor-pointer hover:bg-gray-900 text-black hover-color-custom-yellow" onclick="setActive(this); dropdown('submenu-server-control', 'arrow-server-control')">
                    <div class="flex justify-between w-full items-center">
                        <a href="./404.html" target="content-frame" class="flex items-center w-full">
                            <span class="text-[15px] ml-4">Server</span>
                            <span class="text-sm rotate-180 absolute right-4">
                                <i class="bi bi-chevron-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-grow w-full lg:w-10/12 lg:ml-auto overflow-y-auto">
            <iframe id="content-frame" name="content-frame" src="./overview.html" class="w-full h-full border-0"></iframe>
        </div>
    </div>

    <!-- Footer -->
    <footer class="w-full bg-gray-800 text-white text-center fixed bottom-0 footer-vertical">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center px-4">
            <div class="footer-text text-lg md:text-center md:order-1 bg-gray-800 ml-3 pl-2 pr-3 rounded-r-md">File</div>
            <div class="footer-image md:order-2"><img src="./images/dots-logo.svg" alt="Image" class="w-10 h-auto"></div>
        </div>
    </footer>

    <script type="text/javascript">
        function dropdown(submenuId, arrowId) {
            const submenu = document.getElementById(submenuId);
            const arrow = document.getElementById(arrowId);

            submenu.classList.toggle('hidden');
            arrow.classList.toggle('arrow-down');
        }

        function openSidebar() {
            document.querySelector(".sidebar").classList.toggle("hidden");
        }

        function setActive(element) {
            // Remove active class from all sidebar items and their sub-items
            document.querySelectorAll('.sidebar .active').forEach(function (activeItem) {
                activeItem.classList.remove('active');
            });

            // Add active class to the clicked item and its parent if it's a sub-item
            element.classList.add('active');
            if (element.closest('.admin-wrapper, .storage-files-wrapper, .safety-control-wrapper, .server-control-wrapper')) {
                element.closest('.admin-wrapper, .storage-files-wrapper, .safety-control-wrapper, .server-control-wrapper').querySelector('div:first-child').classList.add('active');
            }
        }
    </script>
</body>

</html>
