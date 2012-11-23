<!DOCTYPE html>
<html lang="en">
    <head>
        <title>cooksCart @yield('title')</title>
        <meta name="description" content="@yield('description')"/>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'/>
        <?php echo HTML::style('assets/css/style.css'); ?>
    </head>
    <body @yield('bodyID')>
        <header>
            <?php
                echo HTML::decode(HTML::link('/',HTML::image('assets/images/logo.png', 'cooksCart', array('id' => 'logo','class' => 'six columns text-right'))));
                
                if(!Auth::check()) {
                    echo Form::open('login','POST',array('id' => 'login','class' => 'six columns row'));
                    echo Form::token();
                    
                    echo Form::text('username', NULL, array('placeholder' => 'Email Address', 'class' => 'three columns'));
                    
                    echo Form::password('password', array('placeholder' => 'Password', 'class' => 'three columns'));
                    
                    echo Form::submit('Login',array('class' => 'button'));
                    
                    echo '&nbsp;'.HTML::link('register','Register');
                    
                    echo '&nbsp;|&nbsp;'.HTML::link('lost','Lost Password?');
                    
                    echo Form::close();
                }
                else {
                    echo '<div id="dashboard" class="six columns text-right">';
                    echo '&nbsp;'.HTML::link('profile',Session::get('user','Guest'));
                    echo '&nbsp;|&nbsp;'.HTML::link('profile/dashboard','Dashboard');
                    echo '&nbsp;|&nbsp;'.HTML::link('recipe/list','Recipes');
                    echo '&nbsp;|&nbsp;'.HTML::link('plans/list','Meal Plans');
                    echo '&nbsp;|&nbsp;'.HTML::link('logout','Logout');
                    echo '</div>';
                }
            ?>
            <div class="row">
                <div class="twelve columns">
                    <?php
                        if($message = Session::get('message')) {
                            echo '<div class="alert success">'.$message.'</div>';
                        }
                        if($message = Session::get('error')) {
                            echo '<div class="alert error">'.$message.'</div>';
                        }
                        if($errors->has('username')) {
                            echo '<div class="alert error">Invalid Username</div>';
                        }
                        if($errors->has('password')) {
                            echo '<div class="alert error">Password required</div>';
                        }
                        
                    ?>
                </div>
            </div>
            @yield('header')
        </header>
        
        <div id="main" class="row">
            @yield('content')
        </div>
        
        <footer class="clear">
            <p>Design by <a href="http://dellustrations.com">Dellustrations.com</a> | Application by <a href="http://alicia.wilkersons.us">Alicia Wilkerson</a></p>
        </footer>
    </body>    
</html>