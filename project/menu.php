<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    
  <nav class="p-5 shadow md:flex md:items-center md:justify-center bg-black relative sticky w-full mb-4 ">
    <div class="flex justify-between items-center ">
      <span class="text-2xl font-[Poppins] cursor-pointer">
        <img class="h-10 inline"
          src="./img/LOGO.png">
      </span>

      <span class="text-3xl cursor-pointer mx-2 md:hidden block bg-white ronded-lg">
        <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
      </span>
    </div>

    <ul class="md:flex md:items-center z-[-1] md:z-auto md:static absolute bg-black text-white w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">
      <li class="mx-4 my-6 md:my-0">
        <a href="#" class="text-xl hover:text-rose-600 duration-500">HOME</a>
      </li>
      <li class="mx-4 my-6 md:my-0">
        <a href="show_product.php" class="text-xl hover:text-rose-600 duration-500">PRODUCT</a>
      </li>
      <li class="mx-4 my-6 md:my-0">
        <a href="#" class="text-xl hover:text-rose-600 duration-500">ABOUT</a>
      </li>
      <li class="mx-4 my-6 md:my-0">
        <a href="#" class="text-xl hover:text-rose-600 duration-500">CONTACT</a>
      </li>
      <li class="mx-4 my-6 md:my-0">
        <a href="#" class="text-xl hover:text-rose-600 duration-500">BLOG'S</a>
      </li>

     <form class="Search flex" method="POST" action="show_product.php">
    <input class="rounded-full text-center text-black" type="search" name="keyword" placeholder="Search" class="...">
    <button class="bg-rose-500 hover:bg-rose-400 text-white font-bold border-b-4 border-rose-700 hover:border-rose-500 roundedbg-rose-500 hover:bg-rose-400 text-white font-bold px-4 border-b-4 border-rose-700 hover:border-rose-500 rounded-full ml-2" type="submit">???????????????</button>
     </form>
     <div class="ml-20">
     <b></b><?php echo $_SESSION["firstname"] . " " . $_SESSION["lastname"] ; ?></b><br>
     <a href="logout.php" class="bg-rose-500 hover:bg-rose-400 text-white font-bold border-b-4 border-rose-700 hover:border-rose-500 roundedbg-rose-500 hover:bg-rose-400 text-white font-bold px-4 border-b-4 border-rose-700 hover:border-rose-500 rounded-full ml-2">???????????????????????????</a>
     </div>
  </nav>


  <script>
    function Menu(e){
      let list = document.querySelector('ul');
      e.name === 'menu' ? (e.name = "close",list.classList.add('top-[80px]') , list.classList.add('opacity-100')) :( e.name = "menu" ,list.classList.remove('top-[80px]'),list.classList.remove('opacity-100'))
    }
  </script>
</body>

</html>