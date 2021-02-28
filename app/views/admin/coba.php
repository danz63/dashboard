<?php view('template/header', $data); ?>
<?php view('template/sidebar'); ?>
<div class="content">
    <nav class="topNav">
        <div class="left">
            <button class="openbtn" onclick="toggleNav()">☰</button>
        </div>
        <div class="right">
            <a href="">User</a>
            <a href="">Logout</a>
        </div>
    </nav>
    <div class="main">
        <!-- content -->
        <h2>Collapsed Sidebar</h2>

        <p>Click on the hamburger menu/bar icon to open the sidebar, and push this content to the right.</p>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea fugit corrupti perferendis non vel quas? Doloribus id ipsum iure, recusandae culpa, reiciendis consectetur consequuntur nesciunt ipsam dolor odit magnam facere!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam perspiciatis, placeat sed saepe iste quas magni aspernatur exercitationem sint laudantium, ipsa voluptatum soluta libero corrupti quia accusantium cumque vel iusto.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In laborum tempora obcaecati suscipit voluptatem expedita quam hic ipsum eius, aperiam, dolores recusandae nihil mollitia officia blanditiis dolore. Facilis, vel esse?</p>
    </div>
</div>
<?php view('template/footer'); ?>