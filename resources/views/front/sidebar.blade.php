<?php
if (!isset($user) || !$user) return;
$levelImg = '';
if ($user->memberLevel == 1) {
    $levelImg .= 'assets/VIP1.e7fec648.png';
}elseif ($user->memberLevel == 2) {
    $levelImg .= 'assets/VIP2.0540cb70.png';
}elseif ($user->memberLevel == 3) {
    $levelImg .= 'assets/VIP3.3f2d6228.png';
}elseif ($user->memberLevel == 4) {
    $levelImg .= 'assets/VIP4.5e9c4b1b.png';
}
               
    
      $vales = 0;
      if (is_array($rewards)) {
        
      if (isset($rewards)) {
        $vales = 0;
        foreach ($rewards as $key => $value) {
          $vales += (float) $value['reward'];
        }
      }
    }else{
       if (isset($rewardd)) {
        $vales = 0;
        foreach ($rewardd as $key => $value) {
          $vales += (float) $value['reward'];
        }
      } 
    }

      ?>
<div class="van-popup van-popup--left" style="display:none; z-index: 2002; width: 90%; overflow: initial;"><div class="container" data-v-55585ad4="" data-v-08abc850=""><div class="head" data-v-55585ad4=""><img src="<?php echo $query->siteLogo; ?>" class="avatar" alt="" data-v-55585ad4=""><div class="user-card" data-v-55585ad4=""><div class="card-wrap" data-v-55585ad4=""><div class="user-top" data-v-55585ad4=""><div class="user-icon" data-v-55585ad4=""><div class="van-uploader" data-v-55585ad4=""><div class="van-uploader__wrapper"><div class="van-uploader__preview"><div class="van-image van-uploader__preview-image"><img src="assets/avatar.ca9e4964.png" class="van-image__img" style="object-fit: cover;"><!----><!----></div><!----><!----></div><div class="van-uploader__upload"><i class="van-badge__wrapper van-icon van-icon-photograph van-uploader__upload-icon"><!----><!----><!----></i><!----><input type="file" class="van-uploader__input" accept="image/*"></div></div></div></div><div class="user-right" data-v-55585ad4=""><div class="username" data-v-55585ad4=""><span class="name" data-v-55585ad4=""><?php echo $user->username; ?></span>
<?php
$querys = \DB::table('user_trials')->where('user_id', $user->id)->where('payment_status','paid')->get();
?>
<?php if($querys->count() > 0){ ?>
    <img width="30" src="<?php echo $levelImg; ?>" alt="" data-v-55585ad4="">
<?php }else{ ?>
    <img width="30" src="assets/trial.png" alt="" data-v-55585ad4="">
<?php } ?>

</div><div class="user-card-footer" data-v-55585ad4=""><div class="mr30" data-v-55585ad4="">Referral Code:</div><div class="code flex-center" data-v-55585ad4=""><span id="textToCopy" class="mr16" data-v-55585ad4=""><?php echo $user->myCode; ?></span>
   
    <img  src="assets/copy.809b1ee4.png" width="20" data-v-55585ad4="">
   
</div></div></div></div><div class="flex-center w100 mt20" data-v-55585ad4="" style="font-size: 14px;"><div class="van-progress" data-v-55585ad4="" style="height: 6px; width: 100%;"><span class="van-progress__portion" style="width: 100%; background: #07090e;"></span><span class="van-progress__pivot" style="left: 100%; transform: translate(-100%, -50%); background: #07090e;">100%</span></div></div></div><div class="money-card-wrap" data-v-55585ad4=""><div class="money-card txt-center van-hairline--right" data-v-55585ad4=""><div class="title" data-v-55585ad4="">Rs <?php echo number_format($user->balance, 2); ?></div><div class="text mt6" data-v-55585ad4="">Account Balance</div></div><div class="money-card txt-center" data-v-55585ad4=""><div class="title" data-v-55585ad4="">Rs <?php echo $vales; ?></div><div class="text mt6" data-v-55585ad4="">Commission</div></div></div></div></div>

<div class="cell-group" data-v-55585ad4="">
<a href="journey">
    <div class="cell-item" data-v-55585ad4=""><div class="cell-left" data-v-55585ad4=""><img src="assets/cell-icon-8.bccc6256.png" alt="" data-v-55585ad4=""><span data-v-55585ad4="">Start journey</span></div><i class="van-badge__wrapper van-icon van-icon-arrow" data-v-55585ad4=""><!----><!----><!----></i></div>
    </a>
<a href="jhistory">
<div class="cell-item" data-v-55585ad4=""><div class="cell-left" data-v-55585ad4=""><img src="assets/cell-icon-2.fa94f428.png" alt="" data-v-55585ad4=""><span data-v-55585ad4="">History</span></div><i class="van-badge__wrapper van-icon van-icon-arrow" data-v-55585ad4=""><!----><!----><!----></i></div>
</a>
<a href="security">
<div class="cell-item" data-v-55585ad4=""><div class="cell-left" data-v-55585ad4=""><img src="assets/cell-icon-4.f3038040.png" alt="" data-v-55585ad4=""><span data-v-55585ad4="">Change Password</span></div><i class="van-badge__wrapper van-icon van-icon-arrow" data-v-55585ad4=""><!----><!----><!----></i></div>
</a>

<a href="deposit">
<div class="cell-item" data-v-55585ad4=""><div class="cell-left" data-v-55585ad4=""><img src="assets/cell-icon-9.bfc44395.png" alt="" data-v-55585ad4=""><span data-v-55585ad4="">Recharge</span></div><i class="van-badge__wrapper van-icon van-icon-arrow" data-v-55585ad4=""><!----><!----><!----></i></div>
</a>
<a href="withdrawal">
<div class="cell-item" data-v-55585ad4=""><div class="cell-left" data-v-55585ad4=""><img src="assets/cell-icon-10.bfb70dfa.png" alt="" data-v-55585ad4=""><span data-v-55585ad4="">Withdrawal</span></div><i class="van-badge__wrapper van-icon van-icon-arrow" data-v-55585ad4=""><!----><!----><!----></i></div>
</a>

<a href="referral">
<div class="cell-item" data-v-55585ad4="">
    <div class="cell-left" data-v-55585ad4="">
        <img src="assets/referral_3591611.png" alt="" data-v-55585ad4=""><span data-v-55585ad4="">Referral Chain</span></div><i class="van-badge__wrapper van-icon van-icon-arrow" data-v-55585ad4=""><!----><!----><!----></i></div>
</a>

<a href="bank">
<div class="cell-item" data-v-55585ad4="">
    <div class="cell-left" data-v-55585ad4="">
        <img src="assets/payment-method_2194654.png" alt="" data-v-55585ad4=""><span data-v-55585ad4="">Payment Method</span></div><i class="van-badge__wrapper van-icon van-icon-arrow" data-v-55585ad4=""><!----><!----><!----></i></div>
</a>
<a href="wallet">
<div class="cell-item" data-v-55585ad4=""><div class="cell-left" data-v-55585ad4=""><img src="assets/cell-icon-6.7da138c8.png" alt="" data-v-55585ad4=""><span data-v-55585ad4="">Withdrawal Info</span></div><i class="van-badge__wrapper van-icon van-icon-arrow" data-v-55585ad4=""><!----><!----><!----></i></div>
</a>
<a href="auth/signoff">
<div class="cell-item" data-v-55585ad4=""><div class="cell-left red" data-v-55585ad4=""><span data-v-55585ad4="">Log out</span></div><i class="van-badge__wrapper van-icon van-icon-arrow" data-v-55585ad4=""><!----><!----><!----></i></div>
</a>

</div><p class="txt-center Powered" data-v-55585ad4="">Copyright ©   <?php echo date('Y'); 
            $query = \DB::table('systemsettings')->first();
             ?><?php echo ' '.$query->siteTitle; ?>. <br> All Rights Reserved.</p></div><!----></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
	$(document).ready(function(){
    // Show .van-popup--left when .menu is clicked
    $('.menu').click(function () {
        $('.van-popup--left').show();
    });

    // Hide .van-popup--left when clicked outside
    $(document).click(function(event) {
        // Check if the clicked element is not within .van-popup--left
        if (!$(event.target).closest('.van-popup--left').length && !$(event.target).hasClass('menu')) {
            // If not, hide .van-popup--left
            $('.van-popup--left').hide();
        }
    });

    // Prevent click propagation inside .van-popup--left
    $('.van-popup--left').click(function(event){
        event.stopPropagation();
    });
});
$('.code').click(function () {
    const textToCopy = document.getElementById('textToCopy').innerText;
    navigator.clipboard.writeText(textToCopy).then(function() {
        alert('Text copied to clipboard!');
    }).catch(function(error) {
        console.error('Failed to copy text: ', error);
    });
})


</script>
<style type="text/css">
    .money-card-wrap{
        background-color: #07090e !important;
    }
    .cell-group .cell-item:hover{
        background-color:  #07090e !important;
        color: white;
        font-size: .40333rem;
    }
</style>

<!-- Begin of Chaport Live Chat code -->
<script type="text/javascript">
(function(w,d,v3){
w.chaportConfig = {
  appId : '67051ecc0e4f9896b7ac6492'
};

if(w.chaport)return;v3=w.chaport={};v3._q=[];v3._l={};v3.q=function(){v3._q.push(arguments)};v3.on=function(e,fn){if(!v3._l[e])v3._l[e]=[];v3._l[e].push(fn)};var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://app.chaport.com/javascripts/insert.js';var ss=d.getElementsByTagName('script')[0];ss.parentNode.insertBefore(s,ss)})(window, document);
</script>
<!-- End of Chaport Live Chat code -->
<script>
setInterval(function() {
    const iframe = document.querySelector('iframe.chaport-inner-iframe'); // Select the iframe with class or ID chaport-inner-iframe
    if (iframe) {
        try {
            const element = iframe.contentWindow.document.querySelector('.chaport-logo.mobile-logo-show');
            if (element) {
                element.remove();
            }
        } catch (error) {
            console.error('Could not access the iframe contents due to cross-origin restrictions.', error);
        }
    }
}, 1000); // Runs every 1000 milliseconds (1 second)

</script>
<?php
$chatbotSettings = \App\Models\SystemSetting::first();
if ($chatbotSettings && $chatbotSettings->chatbot_code) {
    echo $chatbotSettings->chatbot_code;
}
?>