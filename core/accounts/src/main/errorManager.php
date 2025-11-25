<?php class errorManager
{
    public static function accessDenied()
    {
        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        $currentURL = ($_SERVER[REQUEST_URI] == '/') ? "<cl>https://$_SERVER[HTTP_HOST]</cl>" : "<cg>https://$_SERVER[HTTP_HOST]</cg><cy>$_SERVER[REQUEST_URI]</cy>";
        $text = ($lang == 'ru') ? 'Доступ к ресурсу ограничен!' : 'Access to the resource is denied!';
            
        return "<head>
                    <title>$text</title>
                    <link rel='icon' type='image/svg+xml' href='/assets/images/lock.ico'>
                </head>
                <body style='background: #101010'>
                    <div id='imageText'>
                        <img draggable='false' id='image' src='/assets/images/lock.ico'>
                        <h2 align=center id='text'>$text</h2>
                        <code>$currentURL</code>
                    </div>
                </body>
                <style>
                    @media screen and (orientation: portrait)
                    {
                        #image
                        {
                            width: 18%;
                        }
        
                        #text
                        {
                            font-size: 2.1vh;
                        }
        
                        code
                        {
                            font-size: 1.5vh;
                        }
                    }
    
                    h2
                    {
                        font-family: 'Unbounded', sans-serif;
                        color: #fff;
                    }
    
                    code
                    {
                        color: #fff;
                        padding: 1vh 1.35vh;
                        background: #0c0c0c;
                        border-radius: 1vh;
                    }
    
                    #imageText
                    {
                        display: flex;
                        justify-content: center;
                        flex-direction: column;
                        height: 100%;
                        width: 100%;
                        align-items: center;
                    }
    
                    cy { color: #ffb6b6 }
                    cg { color: #ffebb1 }
                </style>";
    }
}