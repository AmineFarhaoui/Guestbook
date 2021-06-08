<?php
    require 'inc/head.php';
    require 'inc/dbh.inc.php'; 

    $sql = "SELECT * FROM posts";
    $result = mysqli_query($conn, $sql);
    $datas = array();

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $datas[] = $row; 
            $datas = array_reverse($datas, true); 
        }
    }
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
                <div class="rounded-md border border-gray-400 w-full ">
                    <?php
                    foreach($datas as $key => $data) {
                    ?>  
                        <div class="rounded p-2">
                            <h3 class="font-bold"><?php echo $data['postUsername'] ?></h3>
                            <div>
                                <p><?php echo $data['postMessage']?></p>
                            </div>
                            <div>
                                <p class="text-xs text-white text-opacity-40"><?php echo $data['postDate']?></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="flex flex-col w-2/5 text-black">
                <h2 class="mb-5 text-white font-normal tracking-widest font-sans">LEAVE A COMMENT</h2>
                <form method="post" action="inc/comment.inc.php" class="space-y-2">
                    <input type="text" name="userName" value="" placeholder="Name.." class="appearance-none border border-transparent  py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-md rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-mintbluelight focus:border-transparent">
                    <input type="text" name="comment" value="" placeholder="Comment.." class="h-40 appearance-none border border-transparent w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-md rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-mintbluelight focus:border-transparent ">
                    <button type="submit" name="submitComment" class="px-4 py-2 rounded bg-gradient-to-t from-mintblue to-mintbluelight text-white">Place comment</button>
                </form>
            </div>
        </section>
    </div>
</body>
</html>