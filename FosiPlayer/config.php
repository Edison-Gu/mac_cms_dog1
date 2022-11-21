<?php
/**
 * @author FosiPlayer
 * @date 2022-09-22
 * @version 1.1.1
 */
#########以下为授权配置参数###########
$authorize=0;//参数0为免费模式，1为授权模式，如果你的版本已获授权，请填入参数1。 
$authorizedomain='';//如果你的版本已获授权，请填入授权的根域名。
#########以下为json解析接口配置参数，部分参数免费模式有效###########
$theapis = [
    [
        'name' => '接口组1', // 任意给接口组取个唯一的名称。
        'index' => 'youku.com,qiyi.com,qq.com,mgtv.com', //授权模式有效。 默认为空。如果填写将作为指定URL优先或独占解析。可填写一个或多个关键词，各关键词间请用英文的逗号隔开。举例：优酷的url地址样式为https://v.youku.com/v_show/id_XNTIwNTIwMjUyOA==.html，如填入youku，表示优酷的视频由本接口优先或独占解析。
        'apitype' =>1, // 远程调用接口为1，本机php代码为0，一般请选择远程调用。如调用本机php代码，需要一定的动手能力，请向开发者寻求帮助。
        'url' => 'http://61.160.223.41:7788/home/api?type=ys&uid=2747969&key=bcgmrstuxHKLRSY017&url=', // 此处填入json解析接口的地址,可填写一个或多个地址（免费模式只能填一个地址），各地址间请用英文的逗号隔开,系统会自动进行分解接口并轮询。
        'parse_timeout' =>5,//解析超时限制，单位为秒。
        'hls_timeout' =>0,//授权模式有效。m3u8文件缓存时间，单位为秒，如果为0则不缓存。
        'hls_ts_jiami' =>0,//授权模式有效。对缓存的m3u8文件进行ts加密，参数0表示不加密，1表示全部加密，2表示随机加密。
        'mp4_timeout' =>0,//授权模式有效。mp4、flv地址缓存时间，单位为秒，如果为0则不缓存。如果缓存，可能造成有二次跳转的播放地址类型无效。
        'resSuccessField' => 'code', // 结果成功字段，一般默认即可。
        'resSuccessCodeVal' => '200', // 成功字段值，一般默认即可。如果匹配失败将跳到下一个API。
        'resUrlType' => 'type', // 视频类型字段，一般默认即可。
        'resUrlField' => 'url', // 结果URL字段，一般默认即可。
        'open' => 1,//授权模式有效。接口启用控制，参数1为启用，其他数字为关闭。
    ],
    [
        'name' => '接口组2',
        'index' => 'BYGA', 
        'apitype' =>1,
        'url' => 'http://61.160.223.41:7788/home/api?type=app&uid=2747969&key=bcgmrstuxHKLRSY017&url=',
        'parse_timeout' =>5,
        'hls_timeout' =>0,
        'hls_ts_jiami' =>0,
        'mp4_timeout' =>0,
        'resSuccessField' => 'code', 
        'resSuccessCodeVal' => '200',
        'resUrlType' => 'type',
        'resUrlField' => 'url', 
        'open' => 1,
    ],
    #一、根据需要，参照以上样例添加更多的接口组及json解析地址，以实现对不同接口的有效管理和轮询解析。注意每个接口组的内容要用[]包起来，并用英文逗号“,”隔开。
    #二、为防止对异常地址进行解析，系统默认以http(s)为关键词，如需解析其他类型的地址，必须在接口的index栏填上关键词，比如某腾的地址格式为LT-652882007cec67ecfdd1c83939979b3e，则其关键词可以为'LT'或者'LT-'。
    #三、温馨提醒：
         #1、如果你的json解析接口既有官解接口，又有切片接口，不要将官解接口和切片接口放在同一个接口组内，而是分不同的接口组进行配置，并且一定要设置为独占模式，以免不同性质的接口互扰。
         #2、系统会自动判断直链地址(即无需解析直接播放的地址)并进行播放，针对直链地址，无需任何设置。
];
$duzhan=1;//指定接口优先/独占控制，参数1独占，其他参数为优先。如果设定为独占，则index设定有关键词的接口为独有接口，不参与其他地址的解析，也不解析其他地址。如果设定为优先，则index设定有关键词的接口为独有接口解析失败，其他接口会参与解析，同时，该接口也会参与其他地址的解析。

#########以下为ip黑名单配置参数，授权模式有效###########
$heimingdanip='';//如果要禁止某个ip解析，在此处填入ip，多个ip请用英文逗号或|隔开，如：111.111.1111.1,222.222.222.2

#########以下为网页版专用接口的加密、防盗配置参数，授权模式有效###########
$zhekey='123456789';//加密认证key，请自行随意修改key密钥。
$keyqidong=1;//api接口key认证防盗，1为启动，其他数字为关闭
$webfangdao=1;//网页端防盗功能，针对缓存的m3u8文件及mp4、flv地址有效，1为启动，其他数字为关闭。
$webua='compatible,YisouSpider,okhttp,Dalvik';//ua限制，如果为空表示不限制。如启动，请填入一个或多个ua关键词，各关键词间用英文的逗号隔开。
$webreferer='';//来路域名限制，如果为空表示不限制，如果填入域名(注意不要带http://或https://)，则除该域名来路外，限制其他任何来路(包括空来路)的请求，如果填写多个域名，各域名间用英文逗号“,”隔开。
$websum=0;//限制每个终端ip单日播放的次数，0为不限制。如开启限制，请填入每日限制的次数。

#########以下为cms播放页防盗链配置参数，授权模式有效###########
$playqidong=0;//参数1为开启，其他数字为关闭。此功能为另外付费项目，需对cms系统的代码进行修改，如需开启，开发者可提供有偿的技术支持。
$playkey='987654321';//认证key，请自行随意修改key密钥。

#########以下为app版专用接口的配置参数，授权模式有效###########
$appqidong=1;//参数1为开启app版专用接口，其他数字为关闭。
$appkey='987654321';//认证key，请自行随意修改key密钥。
$appfangdao=0;//app端防盗功能，针对缓存的m3u8文件及mp4、flv地址有效，1为启动，其他数字为关闭。
$appua='compatible,YisouSpider,okhttp,Dalvik';//ua限制，如果为空表示不限制。如启动，请填入一个或多个ua关键词，各关键词间用英文的逗号隔开。
$appsum=0;//限制每个终端ip单日播放的次数，0为不限制。如开启限制，请填入每日限制的次数。
$appjiamiqidong=0;//app端接口返回数据加密处理，1为启动，其他数字为关闭。
$appjiamikey='';//app端接口返回数据加密key。
$appjiamiiv='';// 如果加密函数需要iv，此处填入iv。
$appjiamidaima='';//app端接口返回数据加密函数，填写格式为：function appjiami($data,$appjiamikey){函数代码}或者function appjiami($data,$appjiamikey,$appjiamiiv){函数代码}。

#########以下为触动key认证、防盗机制后的处理配置，授权模式有效###########
$tiaozhuanurl1='https://www.baidu.com';//触动ua限制、来路、key认证、限制次数等防盗机制后的跳转地址，为空则为默认的文字警告。
$tiaozhuanurl2='https://cn.bing.com';//触动防盗机制后的跳转地址，为空则为默认的文字警告。
$ipfengsha=0;//一旦触动防盗机制，直接封杀ip，封杀时间为60000秒，针对缓存的m3u8文件及mp4、flv地址有效，1为启动，其他数字为关闭。

#########以下为缓存的配置参数，授权模式有效###########
$zhijie=0;//地址直解模式开关，参数0为关闭，其他数字为开启。如果开启，则所有解析的结果不入缓存直接播放，同时也不会提取缓存的数据。
$cachetpye=1;//参数1表示将缓存的m3u8文件存入本地文件夹(注意:其他须缓存的数据还是存入Redis的)，其他数字参数表示存入Redis。
//1.本地文件夹缓存配置
$cachepath='';//本地文件缓存相对路径,系统默认缓存路径为:cache/。填写格式为:解析地址关键词|相对路径，比如某腾的地址格式为LT-652882007cec67ecfdd1c83939979b3e，其关键词为'LT'，缓存路径为lt/,则填写为LT|lt/，多个路径请用小写的逗号隔开，比如'LT-|LT/,youku|yk/'。该项为空或者填写有误，以及没有列入缓存路径的视频文件，均存入默认路径文件夹。
//2.Redis缓存配置
$server='127.0.0.1';//Redis缓存ip地址，一般默认配置即可。
$port='6379';//Redis缓存端口，一般默认配置即可
$requirepass='';//Redis密码，除非你的Redis设置了密码，一般默认为空即可

#########以下为暂停播放时的广告配置参数###########
$zantingguanggaoqidong=0;//暂停播放时的广告启动开关，1为启动，其他为关闭。
$zantingguanggaourl='guanggao.png';//广告图地址。
$zantingguanggaolianjie='https://www.baidu.com';//广告链接地址。

#########以下为视频插入广告配置参数，授权模式有效###########
$charuguanggaoqidong=0;//视频插入广告启动开关，1为启动，其他为关闭。此功能针对缓存的m3u8文件有效。
$charufangshi=1;//参数1为插入片头，2为插入片尾，其他数字为视频中间随机位置插入。
$charuguanggao='
#EXTINF:10.160000,
https://sf9-dycdn-tos.pstatp.com/obj/tos-cn-i-dy/f8eebe4b983e40c9a4e8558158099e0b
#EXTINF:10.000000,
https://sf9-dycdn-tos.pstatp.com/obj/tos-cn-i-dy/1fa039182011429380624abc8eb78b06
#EXTINF:10.000000,
https://sf9-dycdn-tos.pstatp.com/obj/tos-cn-i-dy/9fe27a2fb9c146d3abe10f4abaa089fe
';//按此样例自行填入，不受ts数量限制，每行请用回车键隔开。

#########以下为播放器个性化配置参数###########
$playtype='muiplayer';//选择播放器，本系统默认对接的播放器为：muiplayer、dplayer、artplayer。
$playtittle='FosiPlayer';//给播放器取个名
$contextmenu='FosiPlayer';//右键菜单名
$contextlink='https://banyung.pw';//右键菜单跳转地址
$background='https://pic.rmb.bdstatic.com/bjh/a7f890b31588ad011dc0d62628fab326.jpeg';//播放器背景图
$jiazhaiarray=[//播放器动态加载图，按如下格式添加一个或多个加载图，如为多个，系统会自动随机选取
    'https://img.zcool.cn/community/01898c58c3fb28a801219c77a2fb5a.gif',
    'https://img.zcool.cn/community/010d2c58c3fb40a801219c77c8b1c9.gif',
    'https://img.zcool.cn/community/010cbd58c3fb47a801219c7764b481.gif',
    'https://img.zcool.cn/community/01f0c858c3fb2da801219c779e4776.gif',
    'https://img.zcool.cn/community/0120e15770d11d0000012e7e6f0859.gif',
    'https://img.zcool.cn/community/01ff4059acaceea8012028a97710da.gif',
    'https://img.zcool.cn/community/018b305a1d375ca80120908da51a31.gif',
    'https://img.zcool.cn/community/01e6e95e5b5a1da801216518e9370a.gif',
    'https://img.zcool.cn/community/01ca3b5e5b5a17a801216518a6a176.gif',
    'https://img.zcool.cn/community/0113445e5b5a11a801216518b01a96.gif',
    ];
$themeColor='#66CCCC';//muiplayer、artplayer播放器进度条颜色设置。
$dragSpotShape='square';//muiplayer播放器进度条拖动点的形状设置，可选 circula、square。

#########以下为弹幕配置参数，授权模式有效###########
$danmuqidong=0;//对dplayer、artplayer播放器有效，参数1为开启，其他参数为关闭
$danmuapi='';//弹幕接口地址，默认为空，表示调用本系统接口，如需调用其他接口，请在此处输入弹幕接口地址
$morendanmu='';//首条弹幕词设置，参数为空，则为系统默认弹幕词。
$sendtime=3;//发送弹幕的间隔时间限制，单位为秒。
$pbgjz='操ABCDEFGHIJKLMNOPQRSTUVWSYZabcdefghijklmnopqrstuvwsyz';//敏感关键字限制。

#########以下为php扩展插件检查代码，切勿做任何修改，以免出错###########
if (!extension_loaded('redis')) {die('php未安装redis扩展插件');exit;}
?>