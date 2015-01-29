<?php 
function tpl_542db164_layout__95v8arZBmlP8eggimcnSPA(PHPTAL $tpl, PHPTAL_Context $ctx) {
$_thistpl = $tpl ;
$_translator = $tpl->getTranslator() ;
/* tag "documentElement" from line 1 */ ;
$ctx->setDocType('<!DOCTYPE html>',false) ;
?>

<?php /* tag "html" from line 2 */; ?>
<html lang=en>
<?php /* tag "head" from line 3 */; ?>
<head>
    <?php /* tag "meta" from line 4 */; ?>
<meta charset=utf-8>
    <?php 
/* tag "meta" from line 5 */ ;
if (true):  ;
?>
<meta name=viewport content="width=800, maximum-scale=1"><?php endif; ?>

    <?php /* tag "title" from line 6 */; ?>
<title><?php echo phptal_escape($ctx->path($ctx->meta, 'title')) ?>
</title>
    <?php /* tag "link" from line 7 */; ?>
<link rel=stylesheet href=/assets/stylesheet/animation.css>
    <?php /* tag "link" from line 8 */; ?>
<link rel=stylesheet href=/assets/stylesheet/sprites.css>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php /* tag "script" from line 12 */; ?>
<script src=/assets/scripts/svg4everybody.min.js></script>
</head>
<?php /* tag "body" from line 14 */; ?>
<body>

<!-- HEADER -->
<?php /* tag "header" from line 17 */; ?>
<header>
    <?php /* tag "div" from line 18 */; ?>
<div class=video>
        <?php /* tag "div" from line 19 */; ?>
<div class=showreel><?php echo $_translator->translate('Watch our <strong>Showreel</strong>',false);; ?>
</div>
        <?php /* tag "div" from line 20 */; ?>
<div class=scroll-down>
            <?php /* tag "a" from line 21 */; ?>
<a href=#wwd>
                <?php 
/* tag "svg" from line 22 */ ;
if (false):  ;
?>
<svg class=scroll-down x=0px y=0px viewBox="0 0 40.007 40.007" enable-background="new 0 0 40.007 40.007;">
                </svg><?php endif; ?>

                <?php /* tag "svg" from line 24 */; ?>
<svg class=scroll-down x=0px y=0px viewBox="0 0 83 119.314" enable-background="new 0 0 83 119.314">
                    <?php 
/* tag "use" from line 25 */ ;
if (false):  ;
?>
<use xlink:href=/assets/images/map.svg#scroll-down></use><?php endif; ?>

                    <?php /* tag "use" from line 26 */; ?>
<use xlink:href=/assets/images/map.svg#scroll-down></use>
                </svg>
            </a>
            <?php /* tag "div" from line 29 */; ?>
<div>Scroll down</div>
        </div>
        <?php 
/* tag "div" from line 31 */ ;
if (empty($ctx->core['session']['hide_cookie_box'])):  ;
?>
<div class=cookie>
            <?php /* tag "h3" from line 32 */; ?>
<h3><?php echo $_translator->translate('Cookies',false);; ?>
</h3>
            <?php /* tag "p" from line 33 */; ?>
<p><?php echo $_translator->translate('Please be aware that if you do not configure your browser you will accept cookies provided by this website.',false);; ?>
</p>
            <?php /* tag "a" from line 34 */; ?>
<a class=cookie-accept href=#><?php echo $_translator->translate('I understand!',false);; ?>
</a>

        </div><?php endif; ?>

        <?php /* tag "div" from line 37 */; ?>
<div class=background></div>
        <?php /* tag "svg" from line 38 */; ?>
<svg class=header-logo x=0px y=0px viewBox="0 0 1280 720" enable-background="new 0 0 1280 720">
            <?php /* tag "use" from line 39 */; ?>
<use xlink:href=/assets/images/map.svg#logo-def></use>
        </svg>
        <?php /* tag "div" from line 41 */; ?>
<div class=videoWrapper>
            <?php 
/* tag "iframe" from line 42 */ ;
if (false):  ;
?>
<iframe src="//player.vimeo.com/video/106293474?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff&amp;autoplay=1&amp;loop=1&amp;api=1" width=100% height=1080 frameborder=0 webkitallowfullscreen=webkitallowfullscreen mozallowfullscreen=mozallowfullscreen allowfullscreen=allowfullscreen></iframe><?php endif; ?>

            <?php /* tag "div" from line 43 */; ?>
<div id=player></div>
            <?php 
/* tag "iframe" from line 44 */ ;
if (false):  ;
?>
<iframe width=560 height=315 src="//www.youtube.com/embed/wTcNtgA6gHs?autoplay=1&amp;enablejsapi=1&amp;version=3&amp;controls=0&amp;loop=1&amp;start=10" frameborder=0 allowfullscreen=allowfullscreen></iframe><?php endif; ?>

        </div>
    </div>
</header>
<!-- //HEADER -->


<!-- NAVIGATION -->
<?php /* tag "nav" from line 52 */; ?>
<nav>
    <?php /* tag "div" from line 53 */; ?>
<div>
        <?php /* tag "svg" from line 54 */; ?>
<svg class=nav-logo x=0px y=0px viewBox="0 0 1280 720" enable-background="new 0 0 1280 720">
            <?php /* tag "use" from line 55 */; ?>
<use xlink:href=/assets/images/map.svg#logo-def></use>
        </svg>

    </div>

    <?php /* tag "a" from line 60 */; ?>
<a href=# class=menu-button-action>
        <?php /* tag "svg" from line 61 */; ?>
<svg class=menu-button x=0px y=0px viewBox="0 0 65.046 65.047" style="enable-background:new 0 0 65.046 65.047;">
            <?php /* tag "use" from line 62 */; ?>
<use xlink:href=/assets/images/map.svg#menu-button></use>
        </svg>
    </a>
    <?php /* tag "ul" from line 65 */; ?>
<ul class=cl-effect-3>
        <?php /* tag "li" from line 66 */; ?>
<li>
            <?php /* tag "a" from line 67 */; ?>
<a href=#wwd><?php echo $_translator->translate('What we do?',false);; ?>
</a>
        </li>
        <?php /* tag "li" from line 69 */; ?>
<li>
            <?php /* tag "a" from line 70 */; ?>
<a href=#pf><?php echo $_translator->translate('Portfolio',false);; ?>
</a>
        </li>
        <?php /* tag "li" from line 72 */; ?>
<li>
            <?php /* tag "a" from line 73 */; ?>
<a href=#portfolio><?php echo $_translator->translate('Jobs',false);; ?>
</a>
        </li>
        <?php /* tag "li" from line 75 */; ?>
<li>
            <?php /* tag "a" from line 76 */; ?>
<a href=#portfolio><?php echo $_translator->translate('Contact',false);; ?>
</a>
        </li>
    </ul>
</nav>
<!-- //NAVIGATION -->

<!-- WHAT WE DO -->
<?php /* tag "section" from line 83 */; ?>
<section id=whatwedo>
    <?php /* tag "a" from line 84 */; ?>
<a id=wwd style="margin-top: -40px;"></a>
    <?php /* tag "h2" from line 85 */; ?>
<h2><?php echo $_translator->translate('What we do?',false);; ?>
</h2>
    <?php /* tag "img" from line 86 */; ?>
<img alt=line src="/assets/images/1px_line.png" class=line>
    <?php /* tag "p" from line 87 */; ?>
<p><?php echo $_translator->translate('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac quam ut nulla auctor sollicitudin. Nulla lectus ex, posuere vel dui eget, porta lobortis purus. Ut id nisi sit amet felis placerat venenatis. Sed in neque nisl. Fusce volutpat urna id sapien mattis rutrum. Integer laoreet neque id sodales luctus. In sit amet orci posuere, hendrerit risus pharetra, finibus enim. Nunc magna est, blandit sed accumsan non, vulputate ac tellus. Donec quis felis in urna finibus auctor vel non leo. Ut a dignissim leo, dignissim ultrices dui. Aliquam sodales sed urna nec gravida.',false);; ?>
</p>
    <?php /* tag "div" from line 88 */; ?>
<div class=panel>
        <?php /* tag "div" from line 89 */; ?>
<div class=element>
            <?php /* tag "svg" from line 90 */; ?>
<svg class=wwd-web-interactive x=0px y=0px viewBox="0 0 64 52.719" enable-background="new 0 0 64 52.719">
                <?php /* tag "use" from line 91 */; ?>
<use xlink:href=/assets/images/map.svg#wwd-ico1></use>
            </svg>
            <?php /* tag "h3" from line 93 */; ?>
<h3><?php echo $_translator->translate('web <span>+</span> interactive',false);; ?>
</h3>
        </div>
        <?php /* tag "div" from line 95 */; ?>
<div class=element>
            <?php /* tag "svg" from line 96 */; ?>
<svg class=wwd-motion-animation x=0px y=0px viewBox="0 0 55.74 64" enable-background="new 0 0 55.74 64">
                <?php /* tag "use" from line 97 */; ?>
<use xlink:href=/assets/images/map.svg#wwd-ico2></use>
            </svg>
            <?php /* tag "h3" from line 99 */; ?>
<h3><?php echo $_translator->translate('motion graphics <span>+</span> animation',false);; ?>
</h3>
        </div>
        <?php /* tag "div" from line 101 */; ?>
<div class=element>
            <?php /* tag "svg" from line 102 */; ?>
<svg class=wwd-motion-animation x=0px y=0px viewBox="0 0 64 64" enable-background="new 0 0 64 64">
                <?php /* tag "use" from line 103 */; ?>
<use xlink:href=/assets/images/map.svg#wwd-ico3></use>
            </svg>
            <?php /* tag "h3" from line 105 */; ?>
<h3><?php echo $_translator->translate('applications <span>+</span> games',false);; ?>
</h3>
        </div>
        <?php /* tag "div" from line 107 */; ?>
<div class=element>
            <?php /* tag "svg" from line 108 */; ?>
<svg class=wwd-motion-animation x=0px y=0px viewBox="0 0 64 56.623" enable-background="new 0 0 64 56.623">
                <?php /* tag "use" from line 109 */; ?>
<use xlink:href=/assets/images/map.svg#wwd-ico4></use>
            </svg>
            <?php /* tag "h3" from line 111 */; ?>
<h3><?php echo $_translator->translate('3d <span>+</span> interactive',false);; ?>
</h3>
        </div>
    </div>
</section>
<!-- //WHAT WE DO -->

<!-- INTERMISSION -->
<?php /* tag "section" from line 118 */; ?>
<section id=intermission>
    <?php /* tag "p" from line 119 */; ?>
<p>
        "<?php /* tag "em" from line 120 */; ?>
<em><?php echo $_translator->translate('Design is not just what it looks like and feels like. Design is how it works.',false);; ?>
</em>"
        <?php /* tag "br" from line 121 */; ?>
<br>
        <?php /* tag "small" from line 122 */; ?>
<small>
            Steve Jobs
        </small>
    </p>
</section>
<!-- //INTERMISSION -->

<!-- WHAT WE DO -->
<?php /* tag "section" from line 130 */; ?>
<section id=portfolio>
    <?php /* tag "a" from line 131 */; ?>
<a id=pf style="margin-top: -40px;"></a>
    <?php /* tag "h2" from line 132 */; ?>
<h2><?php echo $_translator->translate('Portfolio',false);; ?>
</h2>
    <?php /* tag "img" from line 133 */; ?>
<img alt=line src="/assets/images/1px_line.png" class=line>
    <?php /* tag "p" from line 134 */; ?>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac quam ut nulla auctor sollicitudin. Nulla lectus ex, posuere vel dui eget, porta lobortis purus.</p>

    <?php /* tag "div" from line 136 */; ?>
<div class=panel>
        <?php /* tag "div" from line 137 */; ?>
<div class="element pull-left">
            <?php /* tag "div" from line 138 */; ?>
<div class=ilustration>
                <?php /* tag "img" from line 139 */; ?>
<img alt=line src="/assets/images/portfolio/img_001.png">
            </div>
            <?php /* tag "article" from line 141 */; ?>
<article>
                <?php /* tag "h2" from line 142 */; ?>
<h2>Jo Nesbo</h2>
                <?php /* tag "p" from line 143 */; ?>
<p>
                    <?php /* tag "img" from line 144 */; ?>
<img alt=line src="/assets/images/1px_line.png" class=line><?php /* tag "br" from line 144 */; ?>
<br>
                    The series follows Harry Hole, a tough detective working for Crime Squad and later with the National Criminal Investigation Service (Kripos) who struggles with alcoholism and works on solving crimes in authentic locations in Oslo and elsewhere, from Australia to the Congo Republic.
                </p>
            </article>
        </div>
        <?php /* tag "div" from line 149 */; ?>
<div class="element pull-right">
            <?php /* tag "div" from line 150 */; ?>
<div class=ilustration>
                <?php /* tag "img" from line 151 */; ?>
<img alt=line src="/assets/images/portfolio/img_002.png">
            </div>
            <?php /* tag "article" from line 153 */; ?>
<article>
                <?php /* tag "article" from line 154 */; ?>
<article>
                    <?php /* tag "h2" from line 155 */; ?>
<h2>Grube</h2>
                    <?php /* tag "p" from line 156 */; ?>
<p>
                        <?php /* tag "img" from line 157 */; ?>
<img alt=line src="/assets/images/1px_line.png" class=line><?php /* tag "br" from line 157 */; ?>
<br>
                        The series follows Harry Hole, a tough detective working for Crime Squad and later with the National Criminal Investigation Service (Kripos) who struggles with alcoholism and works on solving crimes in authentic locations in Oslo and elsewhere, from Australia to the Congo Republic.
                    </p>
                </article>
            </article>
        </div>
        <?php /* tag "div" from line 163 */; ?>
<div class="element pull-left">
            <?php /* tag "div" from line 164 */; ?>
<div class=ilustration>
                <?php /* tag "img" from line 165 */; ?>
<img alt=line src="/assets/images/portfolio/img_003.png">
            </div>
            <?php /* tag "article" from line 167 */; ?>
<article>
                <?php /* tag "h2" from line 168 */; ?>
<h2>iCity</h2>
                <?php /* tag "p" from line 169 */; ?>
<p>
                    <?php /* tag "img" from line 170 */; ?>
<img alt=line src="/assets/images/1px_line.png" class=line><?php /* tag "br" from line 170 */; ?>
<br>
                    The series follows Harry Hole, a tough detective working for Crime Squad and later with the National Criminal Investigation Service (Kripos) who struggles with alcoholism and works on solving crimes in authentic locations in Oslo and elsewhere, from Australia to the Congo Republic.
                </p>
            </article>
        </div>
    </div>
</section>
<!-- //WHAT WE DO -->

<!-- CONTACT -->
<?php /* tag "section" from line 180 */; ?>
<section id=contact>
    <?php /* tag "div" from line 181 */; ?>
<div id=table-display>
        <?php /* tag "div" from line 182 */; ?>
<div class=margin></div>
        <?php /* tag "div" from line 183 */; ?>
<div id=rtgs>
            <?php /* tag "h2" from line 184 */; ?>
<h2>Ready to get started?</h2>
        </div>
        <?php /* tag "div" from line 186 */; ?>
<div id=contact-form>
            <?php /* tag "p" from line 187 */; ?>
<p>Give us a call, send e-mail<?php /* tag "br" from line 187 */; ?>
<br>or fill out the form below</p>
            <?php /* tag "img" from line 188 */; ?>
<img alt=line class=contact-line src="/assets/images/1px_line_N9FA8B0.png">
            <?php /* tag "p" from line 189 */; ?>
<p>Phone</p>
            <?php /* tag "h3" from line 190 */; ?>
<h3><?php /* tag "small" from line 190 */; ?>
<small>(+48)</small> 555 555 555</h3>
            <?php /* tag "p" from line 191 */; ?>
<p>E-mail</p>
            <?php /* tag "h3" from line 192 */; ?>
<h3 class=cl-effect-3>
                <?php /* tag "a" from line 193 */; ?>
<a href=mailto:contact@nod.agency>contact@nod.agency</a>
            </h3>
            <?php /* tag "form" from line 195 */; ?>
<form>
                <?php /* tag "input" from line 196 */; ?>
<input name="cform[full_name]" type=text placeholder="Full name">
                <?php /* tag "input" from line 197 */; ?>
<input name=cform[email] type=email placeholder=E-mail>
                <?php /* tag "input" from line 198 */; ?>
<input name=cform[phone] type=tel placeholder="Phone number">
                <?php /* tag "textarea" from line 199 */; ?>
<textarea name=cform[details] placeholder="How can we help?"></textarea>
                <?php /* tag "button" from line 200 */; ?>
<button type=submit>Submit</button>
            </form>
        </div>
        <?php /* tag "div" from line 203 */; ?>
<div class=margin></div>
    </div>
    <?php /* tag "div" from line 205 */; ?>
<div id=social>

        <?php /* tag "svg" from line 207 */; ?>
<svg x=0px y=0px viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space=preserve>
            <?php /* tag "use" from line 208 */; ?>
<use xlink:href=/assets/images/map.svg#social-facebook></use>
        </svg>

        <?php /* tag "svg" from line 211 */; ?>
<svg x=0px y=0px viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space=preserve>
            <?php /* tag "use" from line 212 */; ?>
<use xlink:href=/assets/images/map.svg#social-twitter></use>
        </svg>

        <?php /* tag "svg" from line 215 */; ?>
<svg x=0px y=0px viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space=preserve>
            <?php /* tag "use" from line 216 */; ?>
<use xlink:href=/assets/images/map.svg#social-vimeo></use>
        </svg>
    </div>
</section>
<!-- //CONTACT -->

<!-- Scripts -->
<?php /* tag "script" from line 223 */; ?>
<script src=//code.jquery.com/jquery-1.11.0.min.js></script>
<?php /* tag "script" from line 224 */; ?>
<script src=//code.jquery.com/jquery-migrate-1.2.1.min.js></script>
<?php /* tag "script" from line 225 */; ?>
<script src=/assets/scripts/jquery.nicescroll.js></script>
<?php 
/* tag "script" from line 226 */ ;
if (false):  ;
?>
<script src=/assets/scripts/froogaloop.min.js></script><?php endif; ?>

<?php /* tag "script" from line 227 */; ?>
<script src=/assets/scripts/application.js></script>
<?php /* tag "script" from line 228 */; ?>
<script type=text/javascript>
    var _paq = _paq || [];
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
        var u=(("https:" == document.location.protocol) ? "https" : "http") + "://nod.agency/piwik/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', 1]);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
        g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
    })();
</script>
<?php /* tag "noscript" from line 240 */; ?>
<noscript><?php /* tag "p" from line 240 */; ?>
<p><?php /* tag "img" from line 240 */; ?>
<img src="http://nod.agency/piwik/piwik.php?idsite=1" style=border:0; alt=""></p></noscript>
<!-- //Scripts -->

</body>
</html><?php 
/* end */ ;

}

?>
<?php /* 
*** DO NOT EDIT THIS FILE ***

Generated by PHPTAL from /application/templates/layout.xhtml (edit that file instead) */; ?>