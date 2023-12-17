<?php

/**
* @package   s9e\TextFormatter
* @copyright Copyright (c) 2010-2022 The s9e authors
* @license   http://www.opensource.org/licenses/mit-license.php The MIT License
*/

namespace Porter\Bundle;

abstract class Vanilla extends \s9e\TextFormatter\Bundle
{
    /**
    * @var s9e\TextFormatter\Parser Singleton instance used by parse()
    */
    protected static $parser;

    /**
    * @var s9e\TextFormatter\Renderer Singleton instance used by render()
    */
    protected static $renderer;

    /**
    * {@inheritdoc}
    */
    public static function getParser()
    {
        // phpcs:disable
        return unserialize('O:24:"s9e\\TextFormatter\\Parser":4:{s:16:"' . "\0" . '*' . "\0" . 'pluginsConfig";a:10:{s:9:"Autoemail";a:5:{s:10:"quickMatch";s:1:"@";s:11:"regexpLimit";i:50000;s:8:"attrName";s:5:"email";s:6:"regexp";s:39:"/\\b[-a-z0-9_+.]+@[-a-z0-9.]*[a-z0-9]/Si";s:7:"tagName";s:5:"EMAIL";}s:8:"Autolink";a:5:{s:8:"attrName";s:3:"url";s:6:"regexp";s:135:"#\\b(?:ftp|https?|mailto):(?>[^\\s()\\[\\]\\x{FF01}-\\x{FF0F}\\x{FF1A}-\\x{FF20}\\x{FF3B}-\\x{FF40}\\x{FF5B}-\\x{FF65}]|\\([^\\s()]*\\)|\\[\\w*\\])++#Siu";s:7:"tagName";s:3:"URL";s:10:"quickMatch";s:1:":";s:11:"regexpLimit";i:50000;}s:7:"Escaper";a:4:{s:10:"quickMatch";s:1:"\\";s:11:"regexpLimit";i:50000;s:6:"regexp";s:30:"/\\\\[-!#()*+.:<>@[\\\\\\]^_`{|}~]/";s:7:"tagName";s:3:"ESC";}s:10:"FancyPants";a:2:{s:8:"attrName";s:4:"char";s:7:"tagName";s:2:"FP";}s:12:"HTMLComments";a:5:{s:10:"quickMatch";s:4:"<!--";s:11:"regexpLimit";i:50000;s:8:"attrName";s:7:"content";s:6:"regexp";s:22:"/<!--(?!\\[if).*?-->/is";s:7:"tagName";s:2:"HC";}s:12:"HTMLElements";a:5:{s:10:"quickMatch";s:1:"<";s:6:"prefix";s:4:"html";s:6:"regexp";s:395:"#<(?>/((?:a(?:bbr)?|br?|code|d(?:[dlt]|el|iv)|em|h[1-6r]|i(?:mg|ns)?|li|ol|pre|r(?:[bp]|tc?|uby)|s(?:pan|trong|u[bp])?|t(?:[dr]|able|body|foot|h(?:ead)?)|ul?))|((?:a(?:bbr)?|br?|code|d(?:[dlt]|el|iv)|em|h[1-6r]|i(?:mg|ns)?|li|ol|pre|r(?:[bp]|tc?|uby)|s(?:pan|trong|u[bp])?|t(?:[dr]|able|body|foot|h(?:ead)?)|ul?))((?>\\s+[a-z][-a-z0-9]*(?>\\s*=\\s*(?>"[^"]*"|\'[^\']*\'|[^\\s"\'=<>`]+))?)*+)\\s*/?)\\s*>#i";s:7:"aliases";a:6:{s:1:"a";a:2:{s:0:"";s:3:"URL";s:4:"href";s:3:"url";}s:2:"hr";a:1:{s:0:"";s:2:"HR";}s:2:"em";a:1:{s:0:"";s:2:"EM";}s:1:"s";a:1:{s:0:"";s:1:"S";}s:6:"strong";a:1:{s:0:"";s:6:"STRONG";}s:3:"sup";a:1:{s:0:"";s:3:"SUP";}}s:11:"regexpLimit";i:50000;}s:12:"HTMLEntities";a:5:{s:10:"quickMatch";s:1:"&";s:11:"regexpLimit";i:50000;s:8:"attrName";s:4:"char";s:6:"regexp";s:38:"/&(?>[a-z]+|#(?>[0-9]+|x[0-9a-f]+));/i";s:7:"tagName";s:2:"HE";}s:8:"Litedown";a:1:{s:18:"decodeHtmlEntities";b:1;}s:10:"MediaEmbed";a:4:{s:10:"quickMatch";s:3:"://";s:6:"regexp";s:26:"/\\bhttps?:\\/\\/[^["\'\\s]+/Si";s:7:"tagName";s:5:"MEDIA";s:11:"regexpLimit";i:50000;}s:10:"PipeTables";a:3:{s:16:"overwriteEscapes";b:1;s:17:"overwriteMarkdown";b:1;s:10:"quickMatch";s:1:"|";}}s:14:"registeredVars";a:3:{s:9:"urlConfig";a:1:{s:14:"allowedSchemes";s:27:"/^(?:ftp|https?|mailto)$/Di";}s:16:"MediaEmbed.hosts";a:15:{s:12:"bandcamp.com";s:8:"bandcamp";s:6:"dai.ly";s:11:"dailymotion";s:15:"dailymotion.com";s:11:"dailymotion";s:12:"facebook.com";s:8:"facebook";s:8:"fb.watch";s:8:"facebook";s:12:"liveleak.com";s:8:"liveleak";s:14:"soundcloud.com";s:10:"soundcloud";s:18:"link.tospotify.com";s:7:"spotify";s:16:"open.spotify.com";s:7:"spotify";s:16:"play.spotify.com";s:7:"spotify";s:9:"twitch.tv";s:6:"twitch";s:9:"vimeo.com";s:5:"vimeo";s:7:"vine.co";s:4:"vine";s:11:"youtube.com";s:7:"youtube";s:8:"youtu.be";s:7:"youtube";}s:16:"MediaEmbed.sites";a:10:{s:8:"bandcamp";a:2:{i:0;a:0:{}i:1;a:2:{i:0;a:2:{s:7:"extract";a:1:{i:0;a:2:{i:0;s:25:"!/album=(?\'album_id\'\\d+)!";i:1;a:2:{i:0;s:0:"";i:1;s:8:"album_id";}}}s:5:"match";a:1:{i:0;a:2:{i:0;s:23:"!bandcamp\\.com/album/.!";i:1;a:1:{i:0;s:0:"";}}}}i:1;a:2:{s:7:"extract";a:3:{i:0;a:2:{i:0;s:29:"!"album_id":(?\'album_id\'\\d+)!";i:1;R:92;}i:1;a:2:{i:0;s:31:"!"track_num":(?\'track_num\'\\d+)!";i:1;a:2:{i:0;s:0:"";i:1;s:9:"track_num";}}i:2;a:2:{i:0;s:25:"!/track=(?\'track_id\'\\d+)!";i:1;a:2:{i:0;s:0:"";i:1;s:8:"track_id";}}}s:5:"match";a:1:{i:0;a:2:{i:0;s:23:"!bandcamp\\.com/track/.!";i:1;R:98;}}}}}s:11:"dailymotion";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:27:"!dai\\.ly/(?\'id\'[a-z0-9]+)!i";i:1;a:2:{i:0;s:0:"";i:1;s:2:"id";}}i:1;a:2:{i:0;s:92:"!dailymotion\\.com/(?:live/|swf/|user/[^#]+#video=|(?:related/\\d+/)?video/)(?\'id\'[a-z0-9]+)!i";i:1;R:121;}i:2;a:2:{i:0;s:17:"!start=(?\'t\'\\d+)!";i:1;a:2:{i:0;s:0:"";i:1;s:1:"t";}}}i:1;R:86;}s:8:"facebook";a:2:{i:0;a:5:{i:0;a:2:{i:0;s:148:"@/(?!(?:apps|developers|graph)\\.)[-\\w.]*facebook\\.com/(?:[/\\w]+/permalink|(?!marketplace/|pages/|groups/).*?)(?:/|fbid=|\\?v=)(?\'id\'\\d+)(?=$|[/?&#])@";i:1;R:121;}i:1;a:2:{i:0;s:66:"@facebook\\.com/(?\'user\'[.\\w]+)/(?=(?:post|video)s?/)(?\'type\'[pv])@";i:1;a:3:{i:0;s:0:"";i:1;s:4:"user";i:2;s:4:"type";}}i:2;a:2:{i:0;s:49:"@facebook\\.com/video/(?=post|video)(?\'type\'[pv])@";i:1;a:2:{i:0;s:0:"";i:1;s:4:"type";}}i:3;a:2:{i:0;s:38:"@facebook\\.com/watch/\\?(?\'type\'[pv])=@";i:1;R:143;}i:4;a:2:{i:0;s:53:"@facebook.com/groups/[^/]*/(?\'type\'p)osts/(?\'id\'\\d+)@";i:1;a:3:{i:0;s:0:"";i:1;s:4:"type";i:2;s:2:"id";}}}i:1;a:1:{i:0;a:3:{s:7:"extract";a:2:{i:0;a:2:{i:0;s:45:"@facebook\\.com/watch/\\?(?\'type\'v)=(?\'id\'\\d+)@";i:1;R:150;}i:1;a:2:{i:0;s:58:"@facebook\\.com/(?\'user\'[.\\w]+)/(?\'type\'v)ideos/(?\'id\'\\d+)@";i:1;a:4:{i:0;s:0:"";i:1;s:4:"user";i:2;s:4:"type";i:3;s:2:"id";}}}s:6:"header";s:29:"User-agent: PHP (not Mozilla)";s:5:"match";a:1:{i:0;a:2:{i:0;s:13:"@fb\\.watch/.@";i:1;R:98;}}}}}s:8:"liveleak";a:2:{i:0;a:1:{i:0;a:2:{i:0;s:41:"!liveleak\\.com/(?:e/|view\\?i=)(?\'id\'\\w+)!";i:1;R:121;}}i:1;a:1:{i:0;a:2:{s:7:"extract";a:1:{i:0;a:2:{i:0;s:28:"!liveleak\\.com/e/(?\'id\'\\w+)!";i:1;R:121;}}s:5:"match";a:1:{i:0;a:2:{i:0;s:24:"!liveleak\\.com/view\\?t=!";i:1;R:98;}}}}}s:10:"soundcloud";a:2:{i:0;a:4:{i:0;a:2:{i:0;s:84:"@https?://(?:api\\.)?soundcloud\\.com/(?!pages/)(?\'id\'[-/\\w]+/[-/\\w]+|^[^/]+/[^/]+$)@i";i:1;R:121;}i:1;a:2:{i:0;s:52:"@api\\.soundcloud\\.com/playlists/(?\'playlist_id\'\\d+)@";i:1;a:2:{i:0;s:0:"";i:1;s:11:"playlist_id";}}i:2;a:2:{i:0;s:89:"@api\\.soundcloud\\.com/tracks/(?\'track_id\'\\d+)(?:\\?secret_token=(?\'secret_token\'[-\\w]+))?@";i:1;a:3:{i:0;s:0:"";i:1;s:8:"track_id";i:2;s:12:"secret_token";}}i:3;a:2:{i:0;s:93:"@soundcloud\\.com/(?!playlists/|tracks/)[-\\w]+/(?:sets/)?[-\\w]+/(?=s-)(?\'secret_token\'[-\\w]+)@";i:1;a:2:{i:0;s:0:"";i:1;s:12:"secret_token";}}}i:1;a:2:{i:0;a:3:{s:7:"extract";a:1:{i:0;a:2:{i:0;s:43:"@soundcloud(?::/)?:tracks:(?\'track_id\'\\d+)@";i:1;R:111;}}s:6:"header";s:29:"User-agent: PHP (not Mozilla)";s:5:"match";a:1:{i:0;a:2:{i:0;s:56:"@soundcloud\\.com/(?!playlists/\\d|tracks/\\d)[-\\w]+/[-\\w]@";i:1;R:98;}}}i:1;a:3:{s:7:"extract";a:1:{i:0;a:2:{i:0;s:49:"@soundcloud(?::/)?/playlists:(?\'playlist_id\'\\d+)@";i:1;R:188;}}s:6:"header";s:29:"User-agent: PHP (not Mozilla)";s:5:"match";a:1:{i:0;a:2:{i:0;s:30:"@soundcloud\\.com/[-\\w]+/sets/@";i:1;R:98;}}}}}s:7:"spotify";a:2:{i:0;a:1:{i:0;a:2:{i:0;s:115:"!(?:open|play)\\.spotify\\.com/(?:user/[-.\\w]+/)?(?\'id\'(?:album|artist|episode|playlist|show|track)(?:[:/][-.\\w]+)+)!";i:1;R:121;}}i:1;a:1:{i:0;a:3:{s:7:"extract";R:220;s:6:"header";s:29:"User-agent: PHP (not Mozilla)";s:5:"match";a:1:{i:0;a:2:{i:0;s:24:"!link\\.tospotify\\.com/.!";i:1;R:98;}}}}}s:6:"twitch";a:2:{i:0;a:4:{i:0;a:2:{i:0;s:47:"#twitch\\.tv/(?:videos|\\w+/v)/(?\'video_id\'\\d+)?#";i:1;a:2:{i:0;s:0:"";i:1;s:8:"video_id";}}i:1;a:2:{i:0;s:73:"#www\\.twitch\\.tv/(?!videos/)(?\'channel\'\\w+)(?:/clip/(?\'clip_id\'[-\\w]+))?#";i:1;a:3:{i:0;s:0:"";i:1;s:7:"channel";i:2;s:7:"clip_id";}}i:2;a:2:{i:0;s:32:"#t=(?\'t\'(?:(?:\\d+h)?\\d+m)?\\d+s)#";i:1;R:128;}i:3;a:2:{i:0;s:59:"#clips\\.twitch\\.tv/(?:(?\'channel\'\\w+)/)?(?\'clip_id\'[-\\w]+)#";i:1;R:238;}}i:1;R:86;}s:5:"vimeo";a:2:{i:0;a:2:{i:0;a:2:{i:0;s:67:"!vimeo\\.com/(?:channels/[^/]+/|video/)?(?\'id\'\\d+)(?:/(?\'h\'\\w+))?\\b!";i:1;a:3:{i:0;s:0:"";i:1;s:2:"id";i:2;s:1:"h";}}i:1;a:2:{i:0;s:19:"!#t=(?\'t\'[\\dhms]+)!";i:1;R:128;}}i:1;R:86;}s:4:"vine";a:2:{i:0;a:1:{i:0;a:2:{i:0;s:25:"!vine\\.co/v/(?\'id\'[^/]+)!";i:1;R:121;}}i:1;R:86;}s:7:"youtube";a:2:{i:0;a:4:{i:0;a:2:{i:0;s:77:"!youtube\\.com/(?:watch.*?v=|shorts/|v/|attribution_link.*?v%3D)(?\'id\'[-\\w]+)!";i:1;R:121;}i:1;a:2:{i:0;s:25:"!youtu\\.be/(?\'id\'[-\\w]+)!";i:1;R:121;}i:2;a:2:{i:0;s:25:"@[#&?]t=(?\'t\'\\d[\\dhms]*)@";i:1;R:128;}i:3;a:2:{i:0;s:26:"![&?]list=(?\'list\'[-\\w]+)!";i:1;a:2:{i:0;s:0:"";i:1;s:4:"list";}}}i:1;R:86;}}}s:14:"' . "\0" . '*' . "\0" . 'rootContext";a:2:{s:7:"allowed";a:2:{i:0;i:65519;i:1;i:65457;}s:5:"flags";i:8;}s:13:"' . "\0" . '*' . "\0" . 'tagsConfig";a:83:{s:8:"BANDCAMP";a:7:{s:10:"attributes";a:3:{s:8:"album_id";a:2:{s:8:"required";b:0;s:11:"filterChain";R:86;}s:8:"track_id";R:281;s:9:"track_num";R:281;}s:11:"filterChain";a:1:{i:0;a:2:{s:8:"callback";s:59:"s9e\\TextFormatter\\Parser\\FilterProcessing::filterAttributes";s:6:"params";a:4:{s:3:"tag";N;s:9:"tagConfig";N;s:14:"registeredVars";N;s:6:"logger";N;}}}s:12:"nestingLimit";i:10;s:5:"rules";a:1:{s:5:"flags";i:3089;}s:8:"tagLimit";i:5000;s:9:"bitNumber";i:2;s:7:"allowed";a:2:{i:0;i:32960;i:1;i:33025;}}s:1:"C";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";a:1:{s:5:"flags";i:66;}s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:0;s:7:"allowed";a:2:{i:0;i:0;i:1;i:0;}}s:4:"CODE";a:7:{s:10:"attributes";a:1:{s:4:"lang";a:2:{s:11:"filterChain";a:1:{i:0;a:2:{s:8:"callback";s:62:"s9e\\TextFormatter\\Parser\\AttributeFilters\\RegexpFilter::filter";s:6:"params";a:2:{s:9:"attrValue";N;i:0;s:23:"/^[- +,.0-9A-Za-z_]+$/D";}}}s:8:"required";b:0;}}s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";a:3:{s:11:"closeParent";a:10:{s:1:"C";i:1;s:2:"EM";i:1;s:5:"EMAIL";i:1;s:6:"STRONG";i:1;s:3:"URL";i:1;s:6:"html:b";i:1;s:9:"html:code";i:1;s:6:"html:i";i:1;s:11:"html:strong";i:1;s:6:"html:u";i:1;}s:12:"fosterParent";R:320;s:5:"flags";i:4436;}s:8:"tagLimit";i:5000;s:9:"bitNumber";i:1;s:7:"allowed";R:305;}s:11:"DAILYMOTION";a:7:{s:10:"attributes";a:2:{s:2:"id";R:281;s:1:"t";R:281;}s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:292;s:8:"tagLimit";i:5000;s:9:"bitNumber";i:2;s:7:"allowed";R:296;}s:3:"DEL";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";a:1:{s:5:"flags";i:512;}s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:0;s:7:"allowed";R:274;}s:2:"EM";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";a:1:{s:5:"flags";i:2;}s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:0;s:7:"allowed";a:2:{i:0;i:65477;i:1;i:65409;}}s:5:"EMAIL";a:7:{s:10:"attributes";a:1:{s:5:"email";a:2:{s:11:"filterChain";a:1:{i:0;a:2:{s:8:"callback";s:61:"s9e\\TextFormatter\\Parser\\AttributeFilters\\EmailFilter::filter";s:6:"params";a:1:{s:9:"attrValue";N;}}}s:8:"required";b:1;}}s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";a:1:{s:5:"flags";i:514;}s:8:"tagLimit";i:5000;s:9:"bitNumber";i:2;s:7:"allowed";a:2:{i:0;i:39819;i:1;i:65457;}}s:3:"ESC";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";a:1:{s:5:"flags";i:1616;}s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:7;s:7:"allowed";R:305;}s:8:"FACEBOOK";a:7:{s:10:"attributes";a:3:{s:2:"id";R:281;s:4:"type";R:281;s:4:"user";R:281;}s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:292;s:8:"tagLimit";i:5000;s:9:"bitNumber";i:2;s:7:"allowed";R:296;}s:2:"FP";a:7:{s:10:"attributes";a:1:{s:4:"char";a:2:{s:8:"required";b:1;s:11:"filterChain";R:86;}}s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:292;s:8:"tagLimit";i:5000;s:9:"bitNumber";i:8;s:7:"allowed";a:2:{i:0;i:32896;i:1;i:33153;}}s:2:"H1";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";a:3:{s:11:"closeParent";R:320;s:12:"fosterParent";R:320;s:5:"flags";i:260;}s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:3;s:7:"allowed";R:351;}s:2:"H2";R:392;s:2:"H3";R:392;s:2:"H4";R:392;s:2:"H5";R:392;s:2:"H6";R:392;s:2:"HC";a:7:{s:10:"attributes";a:1:{s:7:"content";R:384;}s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";a:1:{s:5:"flags";i:3153;}s:8:"tagLimit";i:5000;s:9:"bitNumber";i:7;s:7:"allowed";R:305;}s:2:"HE";R:382;s:2:"HR";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";a:2:{s:11:"closeParent";R:320;s:5:"flags";i:3349;}s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:1;s:7:"allowed";R:389;}s:3:"IMG";a:7:{s:10:"attributes";a:3:{s:3:"alt";R:281;s:3:"src";a:2:{s:11:"filterChain";a:1:{i:0;a:2:{s:8:"callback";s:59:"s9e\\TextFormatter\\Parser\\AttributeFilters\\UrlFilter::filter";s:6:"params";a:3:{s:9:"attrValue";N;s:9:"urlConfig";N;s:6:"logger";N;}}}s:8:"required";b:1;}s:5:"title";R:281;}s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:292;s:8:"tagLimit";i:5000;s:9:"bitNumber";i:0;s:7:"allowed";R:389;}s:8:"ISPOILER";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";a:1:{s:5:"flags";i:0;}s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:0;s:7:"allowed";R:351;}s:2:"LI";a:7:{s:11:"filterChain";a:2:{i:0;R:284;i:1;a:2:{s:8:"callback";s:58:"s9e\\TextFormatter\\Plugins\\TaskLists\\Helper::filterListItem";s:6:"params";a:3:{s:6:"parser";N;s:3:"tag";N;s:4:"text";N;}}}s:12:"nestingLimit";i:10;s:5:"rules";a:3:{s:11:"closeParent";a:12:{s:1:"C";i:1;s:2:"EM";i:1;s:5:"EMAIL";i:1;s:6:"STRONG";i:1;s:3:"URL";i:1;s:6:"html:b";i:1;s:9:"html:code";i:1;s:6:"html:i";i:1;s:11:"html:strong";i:1;s:6:"html:u";i:1;s:2:"LI";i:1;s:7:"html:li";i:1;}s:12:"fosterParent";R:320;s:5:"flags";i:264;}s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:4;s:7:"allowed";a:2:{i:0;i:65519;i:1;i:65441;}}s:4:"LIST";a:7:{s:10:"attributes";a:2:{s:5:"start";a:2:{s:11:"filterChain";a:1:{i:0;a:2:{s:8:"callback";s:67:"s9e\\TextFormatter\\Parser\\AttributeFilters\\NumericFilter::filterUint";s:6:"params";R:360;}}s:8:"required";b:0;}s:4:"type";R:310;}s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";a:3:{s:11:"closeParent";R:320;s:12:"fosterParent";R:320;s:5:"flags";i:3460;}s:8:"tagLimit";i:5000;s:9:"bitNumber";i:1;s:7:"allowed";a:2:{i:0;i:65424;i:1;i:65408;}}s:8:"LIVELEAK";a:7:{s:10:"attributes";a:1:{s:2:"id";R:281;}s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:292;s:8:"tagLimit";i:5000;s:9:"bitNumber";i:2;s:7:"allowed";R:296;}s:5:"MEDIA";a:7:{s:11:"filterChain";a:1:{i:0;a:2:{s:8:"callback";s:54:"s9e\\TextFormatter\\Plugins\\MediaEmbed\\Parser::filterTag";s:6:"params";a:5:{s:3:"tag";N;s:6:"parser";N;s:16:"MediaEmbed.hosts";N;s:16:"MediaEmbed.sites";N;s:8:"cacheDir";N;}}}s:12:"nestingLimit";i:10;s:5:"rules";a:1:{s:5:"flags";i:513;}s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:15;s:7:"allowed";a:2:{i:0;i:65519;i:1;i:65329;}}s:5:"QUOTE";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";a:3:{s:11:"closeParent";R:320;s:12:"fosterParent";R:320;s:5:"flags";i:268;}s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:1;s:7:"allowed";R:457;}s:10:"SOUNDCLOUD";a:7:{s:10:"attributes";a:4:{s:2:"id";R:281;s:11:"playlist_id";R:281;s:12:"secret_token";R:281;s:8:"track_id";R:281;}s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:292;s:8:"tagLimit";i:5000;s:9:"bitNumber";i:2;s:7:"allowed";R:296;}s:7:"SPOILER";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:500;s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:5;s:7:"allowed";R:457;}s:7:"SPOTIFY";R:475;s:6:"STRONG";R:345;s:3:"SUB";R:425;s:3:"SUP";R:425;s:5:"TABLE";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:468;s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:1;s:7:"allowed";a:2:{i:0;i:65408;i:1;i:65418;}}s:4:"TASK";a:7:{s:10:"attributes";a:2:{s:2:"id";a:2:{s:11:"filterChain";a:1:{i:0;a:2:{s:8:"callback";s:62:"s9e\\TextFormatter\\Parser\\AttributeFilters\\RegexpFilter::filter";s:6:"params";a:2:{s:9:"attrValue";N;i:0;s:19:"/^[-0-9A-Za-z_]+$/D";}}}s:8:"required";b:1;}s:5:"state";R:522;}s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:292;s:8:"tagLimit";i:5000;s:9:"bitNumber";i:2;s:7:"allowed";R:389;}s:5:"TBODY";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";a:3:{s:11:"closeParent";a:20:{s:1:"C";i:1;s:2:"EM";i:1;s:5:"EMAIL";i:1;s:6:"STRONG";i:1;s:3:"URL";i:1;s:6:"html:b";i:1;s:9:"html:code";i:1;s:6:"html:i";i:1;s:11:"html:strong";i:1;s:6:"html:u";i:1;s:5:"TBODY";i:1;s:2:"TD";i:1;s:2:"TH";i:1;s:5:"THEAD";i:1;s:2:"TR";i:1;s:10:"html:tbody";i:1;s:7:"html:td";i:1;s:7:"html:th";i:1;s:10:"html:thead";i:1;s:7:"html:tr";i:1;}s:12:"fosterParent";R:320;s:5:"flags";i:3456;}s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:9;s:7:"allowed";a:2:{i:0;i:65408;i:1;i:65416;}}s:2:"TD";a:7:{s:10:"attributes";a:1:{s:5:"align";a:2:{s:11:"filterChain";a:2:{i:0;a:2:{s:8:"callback";s:10:"strtolower";s:6:"params";R:360;}i:1;a:2:{s:8:"callback";s:62:"s9e\\TextFormatter\\Parser\\AttributeFilters\\RegexpFilter::filter";s:6:"params";a:2:{s:9:"attrValue";N;i:0;s:34:"/^(?:center|justify|left|right)$/D";}}}s:8:"required";b:0;}}s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";a:3:{s:11:"closeParent";a:14:{s:1:"C";i:1;s:2:"EM";i:1;s:5:"EMAIL";i:1;s:6:"STRONG";i:1;s:3:"URL";i:1;s:6:"html:b";i:1;s:9:"html:code";i:1;s:6:"html:i";i:1;s:11:"html:strong";i:1;s:6:"html:u";i:1;s:2:"TD";i:1;s:2:"TH";i:1;s:7:"html:td";i:1;s:7:"html:th";i:1;}s:12:"fosterParent";R:320;s:5:"flags";i:256;}s:8:"tagLimit";i:5000;s:9:"bitNumber";i:10;s:7:"allowed";R:457;}s:2:"TH";a:7:{s:10:"attributes";R:564;s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:576;s:8:"tagLimit";i:5000;s:9:"bitNumber";i:10;s:7:"allowed";a:2:{i:0;i:63463;i:1;i:65441;}}s:5:"THEAD";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";a:3:{s:11:"closeParent";R:320;s:12:"fosterParent";R:320;s:5:"flags";i:3456;}s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:9;s:7:"allowed";R:560;}s:2:"TR";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";a:3:{s:11:"closeParent";a:16:{s:1:"C";i:1;s:2:"EM";i:1;s:5:"EMAIL";i:1;s:6:"STRONG";i:1;s:3:"URL";i:1;s:6:"html:b";i:1;s:9:"html:code";i:1;s:6:"html:i";i:1;s:11:"html:strong";i:1;s:6:"html:u";i:1;s:2:"TD";i:1;s:2:"TH";i:1;s:2:"TR";i:1;s:7:"html:td";i:1;s:7:"html:th";i:1;s:7:"html:tr";i:1;}s:12:"fosterParent";R:320;s:5:"flags";i:3456;}s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:11;s:7:"allowed";a:2:{i:0;i:65408;i:1;i:65412;}}s:6:"TWITCH";a:7:{s:10:"attributes";a:4:{s:7:"channel";R:281;s:7:"clip_id";R:281;s:1:"t";R:281;s:8:"video_id";R:281;}s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:292;s:8:"tagLimit";i:5000;s:9:"bitNumber";i:2;s:7:"allowed";R:296;}s:3:"URL";a:7:{s:10:"attributes";a:2:{s:5:"title";R:281;s:3:"url";R:413;}s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:364;s:8:"tagLimit";i:5000;s:9:"bitNumber";i:6;s:7:"allowed";R:368;}s:5:"VIMEO";a:7:{s:10:"attributes";a:3:{s:1:"h";R:281;s:2:"id";R:281;s:1:"t";a:2:{s:11:"filterChain";a:1:{i:0;a:2:{s:8:"callback";s:65:"s9e\\TextFormatter\\Parser\\AttributeFilters\\TimestampFilter::filter";s:6:"params";R:360;}}s:8:"required";b:0;}}s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:292;s:8:"tagLimit";i:5000;s:9:"bitNumber";i:2;s:7:"allowed";R:296;}s:4:"VINE";R:475;s:7:"YOUTUBE";a:7:{s:10:"attributes";a:3:{s:2:"id";a:2:{s:11:"filterChain";R:523;s:8:"required";b:0;}s:4:"list";R:281;s:1:"t";R:646;}s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:292;s:8:"tagLimit";i:5000;s:9:"bitNumber";i:2;s:7:"allowed";R:296;}s:9:"html:abbr";a:7:{s:10:"attributes";a:1:{s:5:"title";R:281;}s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:427;s:8:"tagLimit";i:5000;s:9:"bitNumber";i:0;s:7:"allowed";R:351;}s:6:"html:b";R:345;s:7:"html:br";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";a:1:{s:5:"flags";i:3201;}s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:0;s:7:"allowed";a:2:{i:0;i:65408;i:1;i:65408;}}s:9:"html:code";R:299;s:7:"html:dd";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";a:3:{s:11:"closeParent";a:12:{s:1:"C";i:1;s:2:"EM";i:1;s:5:"EMAIL";i:1;s:6:"STRONG";i:1;s:3:"URL";i:1;s:6:"html:b";i:1;s:9:"html:code";i:1;s:6:"html:i";i:1;s:11:"html:strong";i:1;s:6:"html:u";i:1;s:7:"html:dd";i:1;s:7:"html:dt";i:1;}s:12:"fosterParent";R:320;s:5:"flags";i:256;}s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:12;s:7:"allowed";R:457;}s:8:"html:del";R:339;s:8:"html:div";a:7:{s:10:"attributes";a:1:{s:5:"class";R:281;}s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:500;s:8:"tagLimit";i:5000;s:9:"bitNumber";i:13;s:7:"allowed";R:274;}s:7:"html:dl";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:468;s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:1;s:7:"allowed";a:2:{i:0;i:65408;i:1;i:65456;}}s:7:"html:dt";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:677;s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:12;s:7:"allowed";R:599;}s:7:"html:h1";R:392;s:7:"html:h2";R:392;s:7:"html:h3";R:392;s:7:"html:h4";R:392;s:7:"html:h5";R:392;s:7:"html:h6";R:392;s:6:"html:i";R:345;s:8:"html:img";a:7:{s:10:"attributes";a:5:{s:3:"alt";R:281;s:6:"height";R:281;s:3:"src";a:2:{s:11:"filterChain";R:414;s:8:"required";b:0;}s:5:"title";R:281;s:5:"width";R:281;}s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:668;s:8:"tagLimit";i:5000;s:9:"bitNumber";i:0;s:7:"allowed";R:672;}s:8:"html:ins";R:339;s:7:"html:li";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:440;s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:4;s:7:"allowed";R:457;}s:7:"html:ol";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:468;s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:1;s:7:"allowed";R:472;}s:8:"html:pre";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";a:3:{s:11:"closeParent";R:320;s:12:"fosterParent";R:320;s:5:"flags";i:276;}s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:1;s:7:"allowed";R:351;}s:7:"html:rb";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:604;s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:14;s:7:"allowed";R:672;}s:7:"html:rp";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";a:3:{s:11:"closeParent";a:12:{s:1:"C";i:1;s:2:"EM";i:1;s:5:"EMAIL";i:1;s:6:"STRONG";i:1;s:3:"URL";i:1;s:6:"html:b";i:1;s:9:"html:code";i:1;s:6:"html:i";i:1;s:11:"html:strong";i:1;s:6:"html:u";i:1;s:7:"html:rp";i:1;s:7:"html:rt";i:1;}s:12:"fosterParent";R:320;s:5:"flags";i:3344;}s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:14;s:7:"allowed";R:389;}s:7:"html:rt";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";a:3:{s:11:"closeParent";R:738;s:12:"fosterParent";R:320;s:5:"flags";i:256;}s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:14;s:7:"allowed";R:351;}s:8:"html:rtc";R:731;s:9:"html:ruby";a:7:{s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:427;s:8:"tagLimit";i:5000;s:10:"attributes";R:86;s:9:"bitNumber";i:0;s:7:"allowed";a:2:{i:0;i:65477;i:1;i:65473;}}s:9:"html:span";a:7:{s:10:"attributes";R:695;s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:427;s:8:"tagLimit";i:5000;s:9:"bitNumber";i:0;s:7:"allowed";R:351;}s:11:"html:strong";R:345;s:8:"html:sub";R:425;s:8:"html:sup";R:425;s:10:"html:table";R:513;s:10:"html:tbody";R:533;s:7:"html:td";a:7:{s:10:"attributes";a:2:{s:7:"colspan";R:281;s:7:"rowspan";R:281;}s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:576;s:8:"tagLimit";i:5000;s:9:"bitNumber";i:10;s:7:"allowed";R:457;}s:10:"html:tfoot";R:533;s:7:"html:th";a:7:{s:10:"attributes";a:3:{s:7:"colspan";R:281;s:7:"rowspan";R:281;s:5:"scope";R:281;}s:11:"filterChain";R:283;s:12:"nestingLimit";i:10;s:5:"rules";R:576;s:8:"tagLimit";i:5000;s:9:"bitNumber";i:10;s:7:"allowed";R:599;}s:10:"html:thead";R:602;s:7:"html:tr";R:608;s:6:"html:u";R:345;s:7:"html:ul";R:721;}}');
        // phpcs:enable
    }

    /**
    * {@inheritdoc}
    */
    public static function getRenderer()
    {
        // phpcs:disable
        return unserialize('O:32:"s9e\\TextFormatter\\Renderers\\XSLT":3:{s:9:"' . "\0" . '*' . "\0" . 'params";a:2:{s:16:"MEDIAEMBED_THEME";s:0:"";s:18:"TASKLISTS_EDITABLE";s:0:"";}s:14:"' . "\0" . '*' . "\0" . 'savedLocale";s:1:"0";s:13:"' . "\0" . '*' . "\0" . 'stylesheet";s:10173:"<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:html="urn:s9e:TextFormatter:html" exclude-result-prefixes="html"><xsl:output method="html" encoding="utf-8" indent="no"/><xsl:decimal-format decimal-separator="."/><xsl:param name="MEDIAEMBED_THEME"/><xsl:param name="TASKLISTS_EDITABLE"/><xsl:template match="BANDCAMP"><span data-s9e-mediaembed="bandcamp" style="display:inline-block;width:100%;max-width:400px"><span style="display:block;overflow:hidden;position:relative;padding-bottom:100%"><iframe allowfullscreen="" loading="lazy" scrolling="no" style="border:0;height:100%;left:0;position:absolute;width:100%"><xsl:attribute name="src">//bandcamp.com/EmbeddedPlayer/size=large/minimal=true/<xsl:choose><xsl:when test="@album_id">album=<xsl:value-of select="@album_id"/><xsl:if test="@track_num">/t=<xsl:value-of select="@track_num"/></xsl:if></xsl:when><xsl:otherwise>track=<xsl:value-of select="@track_id"/></xsl:otherwise></xsl:choose><xsl:if test="$MEDIAEMBED_THEME=\'dark\'">/bgcol=333333/linkcol=0f91ff</xsl:if></xsl:attribute></iframe></span></span></xsl:template><xsl:template match="C"><code><xsl:apply-templates/></code></xsl:template><xsl:template match="CODE"><pre><code><xsl:if test="@lang"><xsl:attribute name="class">language-<xsl:value-of select="@lang"/></xsl:attribute></xsl:if><xsl:apply-templates/></code></pre></xsl:template><xsl:template match="DAILYMOTION"><span data-s9e-mediaembed="dailymotion" style="display:inline-block;width:100%;max-width:640px"><span style="display:block;overflow:hidden;position:relative;padding-bottom:56.25%"><iframe allowfullscreen="" loading="lazy" scrolling="no" style="border:0;height:100%;left:0;position:absolute;width:100%"><xsl:attribute name="src">//www.dailymotion.com/embed/video/<xsl:value-of select="@id"/><xsl:if test="@t">?start=<xsl:value-of select="@t"/></xsl:if></xsl:attribute></iframe></span></span></xsl:template><xsl:template match="DEL|EM|H1|H2|H3|H4|H5|H6|STRONG|SUB|SUP|TABLE|TBODY|THEAD|TR|html:b|html:br|html:code|html:dd|html:del|html:dl|html:dt|html:h1|html:h2|html:h3|html:h4|html:h5|html:h6|html:i|html:ins|html:li|html:ol|html:pre|html:rb|html:rp|html:rt|html:rtc|html:ruby|html:strong|html:sub|html:sup|html:table|html:tbody|html:tfoot|html:thead|html:tr|html:u|html:ul|p"><xsl:element name="{translate(local-name(),\'ABDEGHLMNOPRSTUY\',\'abdeghlmnoprstuy\')}"><xsl:apply-templates/></xsl:element></xsl:template><xsl:template match="EMAIL"><a href="mailto:{@email}"><xsl:apply-templates/></a></xsl:template><xsl:template match="ESC"><xsl:apply-templates/></xsl:template><xsl:template match="FACEBOOK"><iframe data-s9e-mediaembed="facebook" allowfullscreen="" loading="lazy" onload="var c=new MessageChannel;c.port1.onmessage=function(e){{style.height=e.data+\'px\'}};contentWindow.postMessage(\'s9e:init\',\'https://s9e.github.io\',[c.port2])" scrolling="no" src="https://s9e.github.io/iframe/2/facebook.min.html#{@type}{@id}" style="border:0;height:360px;max-width:640px;width:100%"/></xsl:template><xsl:template match="FP|HE"><xsl:value-of select="@char"/></xsl:template><xsl:template match="HC"><xsl:comment><xsl:value-of select="@content"/></xsl:comment></xsl:template><xsl:template match="HR"><hr/></xsl:template><xsl:template match="IMG"><img src="{@src}"><xsl:copy-of select="@alt|@title"/></img></xsl:template><xsl:template match="ISPOILER"><span class="spoiler" onclick="removeAttribute(\'style\')" style="background:#444;color:transparent"><xsl:apply-templates/></span></xsl:template><xsl:template match="LI"><li><xsl:if test="TASK"><xsl:attribute name="data-task-id"><xsl:value-of select="TASK/@id"/></xsl:attribute><xsl:attribute name="data-task-state"><xsl:value-of select="TASK/@state"/></xsl:attribute></xsl:if><xsl:apply-templates/></li></xsl:template><xsl:template match="LIST"><xsl:choose><xsl:when test="not(@type)"><ul><xsl:apply-templates/></ul></xsl:when><xsl:otherwise><ol><xsl:copy-of select="@start"/><xsl:apply-templates/></ol></xsl:otherwise></xsl:choose></xsl:template><xsl:template match="LIVELEAK"><span data-s9e-mediaembed="liveleak" style="display:inline-block;width:100%;max-width:640px"><span style="display:block;overflow:hidden;position:relative;padding-bottom:56.25%"><iframe allowfullscreen="" loading="lazy" scrolling="no" src="//www.liveleak.com/e/{@id}" style="border:0;height:100%;left:0;position:absolute;width:100%"/></span></span></xsl:template><xsl:template match="QUOTE"><blockquote><xsl:apply-templates/></blockquote></xsl:template><xsl:template match="SOUNDCLOUD"><iframe data-s9e-mediaembed="soundcloud" allowfullscreen="" loading="lazy" scrolling="no"><xsl:attribute name="src">https://w.soundcloud.com/player/?url=<xsl:choose><xsl:when test="@playlist_id">https%3A//api.soundcloud.com/playlists/<xsl:value-of select="@playlist_id"/>%3Fsecret_token%3D<xsl:value-of select="@secret_token"/></xsl:when><xsl:when test="@track_id">https%3A//api.soundcloud.com/tracks/<xsl:value-of select="@track_id"/>%3Fsecret_token%3D<xsl:value-of select="@secret_token"/></xsl:when><xsl:otherwise><xsl:if test="not(contains(@id,\'://\'))">https%3A//soundcloud.com/</xsl:if><xsl:value-of select="@id"/></xsl:otherwise></xsl:choose></xsl:attribute><xsl:attribute name="style">border:0;height:<xsl:choose><xsl:when test="@playlist_id or contains(@id,\'/sets/\')">450</xsl:when><xsl:otherwise>166</xsl:otherwise></xsl:choose>px;max-width:900px;width:100%</xsl:attribute></iframe></xsl:template><xsl:template match="SPOILER"><details class="spoiler"><xsl:apply-templates/></details></xsl:template><xsl:template match="SPOTIFY"><xsl:choose><xsl:when test="starts-with(@id,\'episode/\')or starts-with(@id,\'show/\')"><iframe data-s9e-mediaembed="spotify" allow="encrypted-media" allowfullscreen="" loading="lazy" scrolling="no" src="https://open.spotify.com/embed/{@id}" style="border:0;height:152px;max-width:900px;width:100%"/></xsl:when><xsl:otherwise><span data-s9e-mediaembed="spotify" style="display:inline-block;width:100%;max-width:320px"><span style="display:block;overflow:hidden;position:relative;padding-bottom:125%;padding-bottom:calc(100% + 80px)"><iframe allow="encrypted-media" allowfullscreen="" loading="lazy" scrolling="no" src="https://open.spotify.com/embed/{translate(@id,\':\',\'/\')}{@path}" style="border:0;height:100%;left:0;position:absolute;width:100%"/></span></span></xsl:otherwise></xsl:choose></xsl:template><xsl:template match="TASK"><input data-task-id="{@id}" type="checkbox"><xsl:if test="@state=\'checked\'"><xsl:attribute name="checked"/></xsl:if><xsl:if test="not($TASKLISTS_EDITABLE)"><xsl:attribute name="disabled"/></xsl:if></input></xsl:template><xsl:template match="TD"><td><xsl:if test="@align"><xsl:attribute name="style">text-align:<xsl:value-of select="@align"/></xsl:attribute></xsl:if><xsl:apply-templates/></td></xsl:template><xsl:template match="TH"><th><xsl:if test="@align"><xsl:attribute name="style">text-align:<xsl:value-of select="@align"/></xsl:attribute></xsl:if><xsl:apply-templates/></th></xsl:template><xsl:template match="TWITCH"><span data-s9e-mediaembed="twitch" style="display:inline-block;width:100%;max-width:640px"><span style="display:block;overflow:hidden;position:relative;padding-bottom:56.25%"><iframe allowfullscreen="" loading="lazy" onload="contentWindow.postMessage(\'\',\'https://s9e.github.io\')" scrolling="no" src="https://s9e.github.io/iframe/2/twitch.min.html#channel={@channel};clip_id={@clip_id};t={@t};video_id={@video_id}" style="border:0;height:100%;left:0;position:absolute;width:100%"/></span></span></xsl:template><xsl:template match="URL"><a href="{@url}"><xsl:copy-of select="@title"/><xsl:apply-templates/></a></xsl:template><xsl:template match="VIMEO"><span data-s9e-mediaembed="vimeo" style="display:inline-block;width:100%;max-width:640px"><span style="display:block;overflow:hidden;position:relative;padding-bottom:56.25%"><iframe allowfullscreen="" loading="lazy" scrolling="no" style="border:0;height:100%;left:0;position:absolute;width:100%"><xsl:attribute name="src">//player.vimeo.com/video/<xsl:value-of select="@id"/><xsl:if test="@h">?h=<xsl:value-of select="@h"/></xsl:if><xsl:if test="@t">#t=<xsl:value-of select="@t"/></xsl:if></xsl:attribute></iframe></span></span></xsl:template><xsl:template match="VINE"><span data-s9e-mediaembed="vine" style="display:inline-block;width:100%;max-width:480px"><span style="display:block;overflow:hidden;position:relative;padding-bottom:100%"><iframe allowfullscreen="" loading="lazy" scrolling="no" src="https://vine.co/v/{@id}/embed/simple?audio=1" style="border:0;height:100%;left:0;position:absolute;width:100%"/></span></span></xsl:template><xsl:template match="YOUTUBE"><span data-s9e-mediaembed="youtube" style="display:inline-block;width:100%;max-width:640px"><span style="display:block;overflow:hidden;position:relative;padding-bottom:56.25%"><iframe allowfullscreen="" loading="lazy" scrolling="no" style="background:url(https://i.ytimg.com/vi/{@id}/hqdefault.jpg) 50% 50% / cover;border:0;height:100%;left:0;position:absolute;width:100%"><xsl:attribute name="src">https://www.youtube.com/embed/<xsl:value-of select="@id"/><xsl:if test="@list">?list=<xsl:value-of select="@list"/></xsl:if><xsl:if test="@t"><xsl:choose><xsl:when test="@list">&amp;</xsl:when><xsl:otherwise>?</xsl:otherwise></xsl:choose>start=<xsl:value-of select="@t"/></xsl:if></xsl:attribute></iframe></span></span></xsl:template><xsl:template match="br"><br/></xsl:template><xsl:template match="e|i|s"/><xsl:template match="html:abbr"><abbr><xsl:copy-of select="@title"/><xsl:apply-templates/></abbr></xsl:template><xsl:template match="html:div"><div><xsl:copy-of select="@class"/><xsl:apply-templates/></div></xsl:template><xsl:template match="html:img"><img><xsl:copy-of select="@alt|@height|@src|@title|@width"/><xsl:apply-templates/></img></xsl:template><xsl:template match="html:span"><span><xsl:copy-of select="@class"/><xsl:apply-templates/></span></xsl:template><xsl:template match="html:td"><td><xsl:copy-of select="@colspan|@rowspan"/><xsl:apply-templates/></td></xsl:template><xsl:template match="html:th"><th><xsl:copy-of select="@colspan|@rowspan|@scope"/><xsl:apply-templates/></th></xsl:template></xsl:stylesheet>";}');
        // phpcs:enable
    }
}
