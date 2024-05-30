<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Light App</title>
    <link href="https://unpkg.com/tailwindcss@^2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="Lightapp.css" />
  </head>
  <body>
    <div class="lightapp w-full h-screen">
      <div class="lightapp-container w-full flex">
        <div class="lightapp-sidebar h-full w-1/4 md:1/4 lg:w-1/6 bg-no-repeat bg-cover bg-center">
            <div class="lightapp-logo px-9 py-7">
                <img class="w-16 h-16" src="images/logo.png" alt="logo">
            </div>
             <nav>
              <ul class="grid gap-2">
                <li>
                  <a 
                    class="flex items-center gap-3 rounded-r-md py-3 bg-black text-sm hover:bg-black"
                    href="#"
                  >
                    <span id="All" class="text-base font-normal px-10">All</span>
                  </a>
                </li>
                <li>
                  <a
                    class="flex items-center gap-3 rounded-r-md py-3 text-sm hover:bg-black"
                    href="#"
                  >
                    <span
                      class="text-base font-normal px-10"
                    >
                      Tool
                    </span>
                  </a>
                </li>
                <li>
                  <a 
                    class="flex items-center gap-3 rounded-r-md py-3 text-sm transition-colors hover:bg-black"
                    href="#"
                  >
                    <span
                      class="text-base font-normal px-10"
                    >
                      Game
                    </span>
                  </a>
                </li>
                <li>
                  <a 
                    class="flex items-center gap-3 rounded-r-md py-3 text-sm ransition-colors hover:bg-black"
                    href="#"
                  >
                    <span
                      class="text-base font-normal px-10"
                    >
                      Movie
                    </span>
                  </a>
                </li>
                <li>
                  <a
                    class="flex items-center gap-3 rounded-r-md py-3 text-sm transition-colors hover:bg-black"
                    href="#"
                  >
                    <span
                      class="text-base font-normal px-10"
                    >
                      Music
                    </span>
                  </a>
                </li>
                <li>
                  <a 
                    class="flex items-center gap-3 rounded-r-md  py-3 text-sm transition-colors hover:bg-black"
                    href="#"
                  >
                    <span
                      class="text-base font-normal px-10"
                    >
                      Life
                    </span>
                  </a>
                </li>
                  <li>
                  <a 
                    class="flex items-center gap-3 rounded-r-md  py-3 text-sm transition-colors hover:bg-black"
                    href="#"
                  >
                    <span
                      class="text-base font-normal px-10"
                    >
                      Others
                    </span>
                  </a>
                </li>
              </ul>
            </nav>
        </div>
        <div class="right-container h-full w-3/4 md:3/4 lg:w-5/6 bg-no-repeat bg-cover">
            <div class="lightapp-header w-full h-28">
                <div class="flex items-center gap-2 py-3 px-6">
                    <img class="w-10 h-10" src="images/lightimg.png" alt="Light Image">
                    <h1 class="text-base font-normal mb-2">Light App</h1>
                </div>
                <div class="lightapp-yellowbar w-full h-12 bg-no-repeat bg-cover bg-center flex items-center justify-between px-7">
                    <span class="text-base font-medium">All</span>
                    <span>
                        <a href="{{ url('/add-form') }}" class="lightapp-btn py-2 px-6 bg-black text-sm rounded-sm">Create a light application</a>
                    </span>
                </div>
            </div>
            <div class="lightapp-content flex gap-10 flex-wrap p-5">
               
            </div>
        </div>
      </div>
      <footer class="w-full h-14 flex items-center justify-between px-9">
        <button id="footerButton" class="text-black px-4 py-3 rounded-md hover:bg-black hover:text-white">
          File
        </button>
        <img id="footer-logo" class="w-10 h-10" src="images/logo.png" alt="Logo" />
      </footer>
    </div>



    <script>
    <?php
// Assuming $app is an array of objects
$dataArray = [];
foreach ($app as $data) {

    $dataArray[] = [
        "name" => $data->name,
        "image" => $data->picture_icon // Assuming image is fixed for all; modify as necessary
    ];
}

    // dump($dataArray);


// JSON encode the PHP array
$jsonData = json_encode($dataArray);
?>
 const aa = JSON.parse('<?php echo $jsonData; ?>');
 console.log(aa);
       const container = document.querySelector(".lightapp-content");
        const data = aa/*[
            { name: "name", image: "images/pptx.png" },
            { name: "Excel", image: "images/ExcelFile.png" },
            { name: "ERP", image: "images/ERP.png" },
            { name: "Mail", image: "images/mail.png" },
            { name: "Chat", image: "images/Chatapp.png" },
        ]*/;

        data.forEach(item => {
            const smallContainer = document.createElement('div');
            smallContainer.className = "small-container w-48 h-56 rounded-lg flex flex-col items-center justify-center gap-5";
            
            smallContainer.innerHTML = `
                <div class="img-container w-16 h-16 rounded-lg bg-white shadow-black flex items-center justify-center">
                    <img class="w-10 h-10" src="${item.image}" alt="${item.name} Image">
                </div>
                <h1 class="font-medium">${item.name}</h1>
               <div> 
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown${item.id}" class="flex items-center justify-between gap-5 text-yellow-300 rounded-md text-lg py-2 px-8" type="button">Add <i class="text-white ri-arrow-down-s-line"></i>
                    </button>

                    <div id="dropdown${item.id}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                          <li>
                            <button data-modal-target="Edit-modal${item.id}" data-modal-toggle="Edit-modal${item.id}" type="button" class="block w-full px-4 py-2 text-base hover:bg-yellow-400 hover:text-black flex gap-2"><i class="ri-edit-box-line"></i>Edit</button>
                          </li>
                          <li>
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button" class="block w-full px-4 py-2 text-base hover:bg-yellow-400 hover:text-black flex gap-2"><i class="ri-delete-bin-6-line"></i>Delete</a>
                          </li>
                        </ul>
                    </div>
                </div>
            `;
            container.appendChild(smallContainer);
        });

        
    </script>
  </body>
</html>
