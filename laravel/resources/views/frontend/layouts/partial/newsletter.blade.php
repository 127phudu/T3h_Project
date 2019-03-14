<div class="newsletter">
    <div class="container">
        <div class="w3agile_newsletter_left">
            <h3>sign up for our newsletter</h3>
        </div>
        <div class="w3agile_newsletter_right">
            <form action="{{ url('/newsletter') }}" method="post">
                @csrf
                <input type="email" name="email" value="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'email';}" required="">
                <input type="submit" value="subscribe now">
            </form>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>