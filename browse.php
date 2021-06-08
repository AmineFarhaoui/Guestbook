<?php
    require 'inc/head.php';
    require 'inc/dbh.inc.php'; 
?>
    <div class="flex flex-col w-full px-20 py-3 max-w-screen-xl">
        <section class="flex w-full pt-24">
            <div class="flex flex-col w-3/5 space-y-4">
                <h1 class="font-bold text-5xl leading-relaxed text-left bg-gradient-to-t text-transparent bg-clip-text from-mintblue to-mintbluelight ">Leave a comment behind!</h1>
            </div>
        </section>
        <section id="browse" class="flex w-full mt-24 space-x-4">
            <div class="w-3/5">
                <h2 class="mb-5 font-normal tracking-widest font-sans">LATEST COMMENTS</h2>
                <div id="commentSection" class="mt-8 bg-black bg-opacity-20 rounded-md border border-gray-500 w-full">

                </div>
            </div>
            <div class="flex flex-col w-2/5 text-black">
                <h2 class="mb-5 text-white font-normal tracking-widest font-sans">LEAVE A COMMENT</h2>
                <div id="data" class=""></div>

                <!-- <form method="post" action="inc/comment.inc.php" onsubmit="postName()" id="postform">
                    <input type="text" name="name" id="name2">
                    <input type="text" name="message" id="message">
                    <input type="submit" value="submit" name="submit" id="submit">
                </form> -->

                <div id="commentSection" class="p-3 mt-3 bg-black bg-opacity-20 rounded-md border border-gray-500 w-full ">
                    <form method="post" action="inc/comment.inc.php" onsubmit="event.preventDefault(); postName();" id="postform" class="space-y-2">
                        <div class="flex w-full space-x-1">
                            <input type="text" name="firstname" id="firstname" value="" placeholder="First name.." class="appearance-none border border-transparent w-1/2 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-md rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-mintbluelight focus:border-transparent">
                            <input type="text" name="lastname" id="lastname" value="" placeholder="Last name.." class="appearance-none border border-transparent w-1/2 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-md rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-mintbluelight focus:border-transparent">
                        </div>
                        <input type="text" name="email" id="email" value="" placeholder="E-mail.." class="appearance-none border border-transparent w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-md rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-mintbluelight focus:border-transparent">
                        <input type="text" name="message" id="message" value="" placeholder="Comment.." class="h-40 appearance-none border border-transparent w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-md rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-mintbluelight focus:border-transparent ">
                        <button type="submit" name="submit" id="submit" class="px-4 py-2 rounded bg-gradient-to-t from-mintblue to-mintbluelight text-white">Place comment</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script src="js/index.js"></script>
</body>
<?php
    require 'inc/footer.html';
?>
</html>