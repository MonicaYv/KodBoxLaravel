<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta ="viewport" content="initial-scale=1, width=device-width" />
    <link
      href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="w-full h-screen">
      <div class="dashboard w-full h-full bg-no-repeat">
        <div
          class="navbar flex items-center justify-end gap-8 p-2 md:p-4 lg:p-3"
        >
          <i class="ri-search-line text-white text-2xl"></i>
          <i
            id="notification-icon"
            class="ri-notification-line text-white text-2xl"
          ></i>
          <i class="ri-wifi-line text-white text-2xl"></i>
          <i class="ri-volume-up-line text-white text-2xl"></i>
          <i class="ri-battery-fill text-white text-2xl"></i>
        </div>
        <div class="clock" id="clock"></div>
        <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 float-right" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
        </svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">Logged in Successfully!!</div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only" id="close">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
        </div>
        <div class="sidebar w-16 h-max p-1 rounded-lg">
          <img class="mb-1" src="{{ asset('images/Dairy.png') }}" alt="Dairy" />
          <img class="mb-1" src="{{asset('images/Calendar.png') }}" alt="Calendar" />
          <img class="mb-1" src="{{ asset('images/Appstore.png') }}" alt="Appstore" />
          <img class="mb-1" src="{{ asset('images/EmptyBin.png') }}" alt="EmptyBin" />
        </div>
        <div id="notification" class="Notification w-56 h-48 rounded-lg hidden">
          <div class="border-b-2 p-5 text-center">
            <h1 class="text-normal">Notification Center</h1>
          </div>
          <div class="flex items-center justify-center p-4">
            <p>Empty</p>
          </div>
        </div>
        <div id="administrator" class="Administrator h-max rounded-md hidden">
          <div class="flex items-center gap-2 p-5">
            <div class="logo">
              <img class="w-16" src="images/profile.png" alt="user image" />
            </div>
            <div class="user-info">
              <h1 class="text-lg underline decoration-yellow-700">
                Administrator
              </h1>
              <h4 class="text-sm">Username</h4>
            </div>
          </div>
          <div class="bottom border-t-2 border-slate-400">
            <div class="features-list p-5">
              <ul>
                <li class="flex items-center gap-5 mb-4">
                  <i class="ri-folder-line"></i>
                  <a href="#">File manage</a>
                </li>
                <li class="flex items-center gap-5 mb-4">
                  <i class="ri-bar-chart-fill"></i>
                  <a href="#">Backend</a>
                </li>
                <li class="flex items-center gap-5 mb-4">
                  <i class="ri-user-line"></i>
                  <a href="{{ route('useradmin') }}">User manage</a>
                </li>
                <li class="flex items-center gap-5 mb-4">
                  <i class="ri-apps-fill"></i>
                  <a href="#">Plugin</a>
                </li>
                <li class="flex items-center gap-5 mb-4">
                  <i class="ri-global-line"></i>
                  <a href="#">Language</a>
                </li>
                <li class="flex items-center gap-5 mb-4">
                  <i class="ri-fullscreen-line"></i>
                  <a href="#">Full screen</a>
                </li>
                <li class="flex items-center gap-5 mb-4">
                  <i class="ri-information-fill"></i>
                  <a href="#">About</a>
                </li>
                <li class="flex items-center gap-5 mb-4">
                  <i class="ri-download-line"></i>
                  <a href="#">Downloads</a>
                </li>
                <li class="flex items-center gap-5 mb-4">
                  <i class="ri-mail-line"></i>
                  <a href="#">Free edition</a>
                </li>
                <li class="flex items-center gap-5 mb-4">
                  <i class="ri-logout-box-r-line"></i>
                  <!--<a href="#">Logout</a>-->
                  <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div id="tooltip" class="tooltip bubble-bottom-left">
          <div class="bubble">
            <div class="bubble-content">
              <h1>Hello!</h1>
              <p>What are you looking for? &#128522;</p>
            </div>
          </div>
        </div>
        <footer
          class="fixed bottom-0 flex items-center justify-between w-full p-2"
        >
          <button
            id="footerButton"
            class="text-black px-5 py-2 rounded-md hover:bg-black hover:text-white"
          >
            File
          </button>
          <img
            id="footer-logo"
            class="w-12 h-12"
            src="images/logo.png"
            alt="Logo"
          />
        </footer>
      </div>
    </div>

    <script>
      function updateClock() {
        const clock = document.getElementById("clock");
        const now = new Date();

        const hours = String(now.getHours()).padStart(2, "0");
        const minutes = String(now.getMinutes()).padStart(2, "0");

        const days = [
          "Sunday",
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
          "Saturday",
        ];
        const months = [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December",
        ];
        const day = days[now.getDay()];
        const month = months[now.getMonth()];
        const date = now.getDate();

        const timeString = `${hours}:${minutes}`;
        const dateString = `${day}, ${month} ${date}`;

        clock.innerHTML = `<div class="time text-white text-5xl font-medium">${timeString}</div><div class="date font-medium">${dateString}</div>`;
      }

      updateClock();
      setInterval(updateClock, 60000);

      document
        .getElementById("notification-icon")
        .addEventListener("click", function () {
          const notificationDiv = document.getElementById("notification");
          notificationDiv.classList.toggle("hidden");
        });

      document
        .getElementById("footer-logo")
        .addEventListener("click", function () {
          const administratorDiv = document.getElementById("administrator");
          administratorDiv.classList.toggle("hidden");
        });

      const footerButton = document.getElementById("footerButton");
      const tooltip = document.getElementById("tooltip");

      footerButton.addEventListener("mouseenter", function () {
        tooltip.style.display = "block";
      });

      footerButton.addEventListener("mouseleave", function () {
        tooltip.style.display = "none";
      });

      //for dimissing toast
       document.querySelectorAll('[data-dismiss-target]').forEach(function(button) {
        button.addEventListener('click', function() {
            var target = document.querySelector(button.getAttribute('data-dismiss-target'));
            if (target) {
                target.style.display = 'none';
            }
        });
    });
    </script>
  </body>
</html>
