<div class="wrap">
   
   <h1 class="main_heading"> <b>Kommunicate Plugin Settings</b></h1>
   <?php settings_errors(); ?>
  
   <div class="main_content">
    <ul class="nav nav-tabs">
       <li class="active"><a href="#tab-1">Dashboard</a></li>
       <li class=""><a href="#tab-2">Description</a></li>
       <li class=""><a href="#tab-3">Updates</a></li>
    </ul>

    <div class="tab-content">
   
       <div id="tab-1" class="tab-pane active">
      
          <form method="post" action="options.php" class = "form">
             <div class="input_field">
                 <?php 
                    settings_fields( 'kommunicate_plugin_setting' );
                    do_settings_sections( 'kommunicate-live-chat' );
                  ?>

                  <div class="button_div" >
                    <button class="save_button">Save Changes</button>
                  </div>
              </div>     
          </form>  
       </div>

       <div id="tab-2" class="tab-pane">
          <div class="description">
             <h1 class="input_field">How to Add Live Chat Plugin in WordPress Websites?</h1>
             <h2>Adding live chat on your WordPress websites and as easy as it gets. Leverage the live chat to interact with your website visitor and customers easily by following these steps :</h2>
             <ul class="description_steps">
                <li>Clone this repository into your plugins directory or download the zip file and unzip on your plugins directory.</li>
                <li>or Install the Free plugin from the WordPress plugin store and activate it.</li>
                <li>Go to Plugin settings, then Enter Your <a href="https://dashboard.kommunicate.io/settings/install" target="_blank" class="kommunicate-anchor">APP_ID</a> from kommunicate to enable chat widget.</li>
                <li>Voila! Live chat is now active on your website.</li>
                <li>Open the website, refresh it and check out the chat plugin. You will find it in the bottom-right corner.</li>
                <li>You might need to clear cache if your using any cache plugin to see your updates.</li>
                <li>For support, please <a href="https://www.kommunicate.io/contact-us" target="_blank" class="kommunicate-anchor">contact us</a> via chat on our website or reach out to <a href="mailto:support@kommunicate.io" class="kommunicate-anchor">support@kommunicate.io</a>.</li>
             </ul>
          </div>
       </div>

       <div id="tab-3" class="tab-pane">
         <h3> Updates</h3>
         <ul class="description_steps">
            <li> Version: 1.0.0 :  initial release</li>
         </ul>
       </div>
    </div>
     <div class="kommunicate_footer-text">
         Don’t have an APP_ID? Sign up for <a href="https://dashboard.kommunicate.io/signup" target="_blank" class="kommunicate-anchor">&nbsp;kommunicate&nbsp;</a> and get your's!
     </div>
   </div>
</div>
