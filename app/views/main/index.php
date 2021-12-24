
<div class="container">
    <div class="content">
        <div class="header">
            <div class="navbar">
                <div class="logo">
                    <img src="public/images/logo.svg" alt="">
                    <span>pineapple.</span>
                </div>
                <div class="navigation">
                    <a href="#">About</a>
                    <a href="#">How it works</a>
                    <a href="#">Contact</a>
                </div>
            </div>
        </div>
        <div class="formContainer">
            <div class="form">
                <!-- <div class="cup">
                   
                </div> -->
                <div class="title">
                    <h3>Subscribe to newsletter</h3>
                    <p>Subscribe to our newsletter and get 10% discount on pineapple glasses.</p>
                </div>
            
    
                <form id="form" action="/" method="post" >
                    <div class="input">
                        <input id="email" type="text" name="email" placeholder="Type your email address here…" value="<?php echo $val ?>">  
                        <button id="submit" type="submit" name="submit"><span class="link icon-submit"></span></button>
                    </div>  
                    <div id="error">
                        <?php echo $error ?>
                    </div>
                    <div class="checkbox_block">
                        <div>
                        <input class="checkbox" type="checkbox" name="checkbox" id="checkbox" > 
                        </div>
                        
                        <div class="rules">
                            I agree to <span>terms of service</span>
                        </div>
                    </div>      
                </form>
                <div class="socials">
                    <div class="socials__icons facebook">
                        <a href="#" class="link icon-facebook"></a>
                    </div>
                    <div class="socials__icons instagram">
                        <a href="#" class="link icon-instagram"></a>
                    </div>
                    <div class="socials__icons twitter">
                        <a href="#" class="link icon-twitter"></a>
                    </div>
                    <div class="socials__icons youtube">
                        <a href="#" class="link icon-youtube"></a>
                    </div>
                    
                    
                </div>
            </div>
        </div>       
    </div>
</div>
    

<script src="./../public/JsScripts/validation.js"></script>

