<html>

	<head>
		<link href="https://cdn.bootcdn.net/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.css" rel="stylesheet">
		<style>
			body{color:rgba(0,0,0,0.85);font:14px Helvetica Neue,Helvetica,PingFang SC,Tahoma,Arial,sans-serif}.layui-form-item{margin-bottom:15px;clear:both;*zoom:1;min-width:560px}label{line-height:20px;display:inline-block;margin-left:5px;margin-right:15px;vertical-align:middle}.radio_type{width:20px;height:20px;appearance:none;position:relative;cursor:pointer}.radio_type:before{content:"";width:20px;height:20px;border:1px solid#7d7d7d;display:inline-block;border-radius:50%;vertical-align:middle}.radio_type:checked:before{content:"";width:20px;height:20px;border:1px solid#c59c5a;background:#c59c5a;display:inline-block;border-radius:50%;vertical-align:middle}.radio_type:checked:after{content:"";width:10px;height:5px;border:2px solid white;border-top:transparent;border-right:transparent;text-align:center;display:block;position:absolute;top:6px;left:5px;vertical-align:middle;transform:rotate(-45deg)}.layui-form-label{position:relative;float:left;display:block;padding:9px 15px;width:200px;font-weight:400;line-height:20px;text-align:right}.layui-form-label-col{display:block;float:none;padding:9px 0;line-height:20px;text-align:left}.radio_type:checked+label{color:#c59c5a}.layui-input,.layui-textarea{display:block;width:100%;padding-left:10px}.layui-input,.layui-select,.layui-textarea{height:38px;line-height:1.3;line-height:38px\9;border-width:1px;border-style:solid;background-color:#fff;color:rgba(0,0,0,0.85);border-radius:2px}.layui-badge-rim,.layui-border,.layui-colla-content,.layui-colla-item,.layui-collapse,.layui-elem-field,.layui-form-pane.layui-form-item[pane],.layui-form-pane.layui-form-label,.layui-input,.layui-layedit,.layui-layedit-tool,.layui-panel,.layui-quote-nm,.layui-select,.layui-tab-bar,.layui-tab-card,.layui-tab-title,.layui-tab-title.layui-this:after,.layui-textarea{border-color:#eee}.layui-btn,.layui-input,.layui-select,.layui-textarea,.layui-upload-button{outline:0;-webkit-appearance:none;transition:all 0.3s;-webkit-transition:all 0.3s;box-sizing:border-box}button,input,optgroup,option,select,textarea{font-family:inherit;font-size:inherit;font-style:inherit;font-weight:inherit;outline:0}blockquote,button,dd,div,dl,dt,form,h1,h2,h3,h4,h5,h6,input,li,ol,p,pre,td,textarea,th,ul{margin:0;padding:0;-webkit-tap-highlight-color:rgba(0,0,0,0)}.layui-input-block{margin-left:250px;min-height:36px}.layui-form-mid{float:left;display:block;padding:9px 0!important;line-height:20px;margin-right:10px}.layui-text em,.layui-word-aux{color:#999!important;padding-left:5px!important;padding-right:5px!important}:root.layui-form-selected.layui-edge{margin-top:-9px\0/IE9}.nice-select{width:245px;padding:0 15px;height:38px;position:relative;box-shadow:0 0 1px#999;background:#fff url(data:image/jpg;base64,/9j/4AAQSkZJRgABAQEASABIAAD/2wBDAAICAgICAgICAgIDAgICBAUEAgIEBQYFBQUFBQYHBgYGBgYGBwcICAkICAcKCgsLCgoODg4ODg4ODg4ODg4ODg7/2wBDAQMDAwYFBgsHBwsODAoMDhEQEBAQEREODg4ODg4ODg4ODg4ODg4ODg4ODg4ODg4ODg4ODg4ODg4ODg4ODg4ODg7/wAARCAAHABQDAREAAhEBAxEB/8QAFgAAAwAAAAAAAAAAAAAAAAAABQcJ/8QAJBAAAQMCBAcAAAAAAAAAAAAAAQMEBQIRAAYHQRITITJRYXH/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8Ar9nrS5SSnWj+E5bdOWVtJpmwCdVialaRvcAm3n70BywcKxy/GN4yPT4G7cd29R3qPs4AzgP/2Q==)no-repeat right center}.nice-select input{display:block;width:100%;height:38px;line-height:38px\9;border:0;outline:0;background:none;cursor:pointer}.nice-select ul{width:100%;display:none;position:absolute;left:-1px;top:40px;overflow:hidden;background-color:#fff;max-height:150px;overflow-y:auto;border:1px solid#999;border-top:0;box-shadow:0 3px 5px#999;z-index:9999}.nice-select ul li{height:30px;line-height:30px;overflow:hidden;padding:0 10px;cursor:pointer}.nice-select ul li.on{background-color:#e0e0e0}.mysubt{line-height:38px;height:38px;width:100px;color:#ffffff;background-color:#009688;font-size:14px;font-weight:bold;font-family:Arial;border:1px solid transparent;-webkit-border-top-left-radius:5px;-moz-border-radius-topleft:5px;border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-moz-border-radius-topright:5px;border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-moz-border-radius-bottomleft:5px;border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;-moz-border-radius-bottomright:5px;border-bottom-right-radius:5px;text-align:center;display:inline-block;text-decoration:none}.mysubt:hover{background-color:#00c9b6}.show_msg_ze{width:100%;height:100%;background-color:#000;position:absolute;top:0;left:0;z-index:2;opacity:0.3;filter:alpha(opacity=30)}.show_msg{color:#838383;position:absolute;top:50%;left:50%;border:1px solid#d1d1d1;padding:15px 36px;background-color:#fff;z-index:3}.tagsinput{border:1px solid#CCC;background:#FFF;padding:5px;width:300px;height:100px;overflow-y:auto}.tagsinput.tag{border:1px solid#a5d24a;-moz-border-radius:2px;-webkit-border-radius:2px;display:block;float:left;padding:5px;text-decoration:none;background:#cde69c;color:#638421;margin-right:5px;margin-bottom:5px;font-family:helvetica;font-size:13px}.tagsinput.tag a{font-weight:bold;color:#ad442b;text-decoration:none;font-size:11px}.tagsinput input{width:80px;margin:0px;font-family:helvetica;font-size:13px;border:1px solid transparent;padding:5px;background:transparent;color:#000;outline:0px;margin-right:5px;margin-bottom:5px}div.tagsinput span.tag a{color:#df5c5c}.store_info_desc{color:#a5a5a5;margin-left:260px}.store_info_desc p{padding-bottom:4px}
		</style>
		<script src="https://libs.baidu.com/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://cdn.bootcdn.net/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"></script>
	</head>

	<body>
		<form id="storeform">
			<div class="layui-form-item" style="text-align: center; margin-top: 40px">
				<input type="radio" class="radio_type" id="local" name="stortype" value="local" {if
					empty($settings['stortype']) || $settings['stortype']=='local' } checked="checked" {/if}
					title="本地服务器">
				<label style="cursor: pointer" for="local">本地服务器</label>
				<input type="radio" class="radio_type" id="qiniu" name="stortype" value="qiniu" {if
					!empty($settings['stortype'])&&$settings['stortype']=='qiniu' } checked="checked" {/if}
					title="七牛云存储">
				<label style="cursor: pointer" for="qiniu">七牛云存储</label>
				<input type="radio" class="radio_type" id="oss" name="stortype" value="oss" {if
					!empty($settings['stortype'])&&$settings['stortype']=='oss' } checked="checked" {/if}
					title="阿里云OSS">
				<label style="cursor: pointer" for="oss">阿里云OSS</label>
				<input type="radio" class="radio_type" id="cos" name="stortype" value="cos" {if !empty($settings['stortype'])&&$settings['stortype']=='cos' } checked="checked" {/if} title="腾讯云存储">
				<label style="cursor: pointer" for="cos">腾讯云存储</label>
				<input type="radio" class="radio_type" id="bos" name="stortype" value="bos" {if !empty($settings['stortype'])&&$settings['stortype']=='bos' } checked="checked" {/if} title="腾讯云存储">
				<label style="cursor: pointer" for="bos">百度云存储</label>
				<input type="radio" class="radio_type" id="upyun" name="stortype" value="upyun" {if !empty($settings['stortype'])&&$settings['stortype']=='upyun' } checked="checked" {/if} title="腾讯云存储">
				<label style="cursor: pointer" for="upyun">又拍云存储</label>
				<input type="radio" class="radio_type" id="obs" name="stortype" value="obs" {if !empty($settings['stortype'])&&$settings['stortype']=='obs' } checked="checked" {/if} title="腾讯云存储">
				<label style="cursor: pointer" for="obs">华为云存储</label>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">环境说明：</label>
				<div class="layui-input-block store_info_desc">
					<p>当前 PHP 环境是否可以接受文件上传: {:ini_get('file_uploads') ? '支持' : '不支持'}</p>
					<p>当前 PHP 环境允许最大 内存 大小为: {:ini_get('memory_limit')}</p>
					<p>当前 PHP 环境允许最大单个上传文件大小为: {:ini_get('upload_max_filesize')}</p>
					<p>当前 PHP 环境允许最大 POST 表单大小为: {$post_max_size}</p>
				</div>
			</div>
			<div id="myTabContent" class="tab-content" style="margin: 10px; margin-right: 100px">
				<div style="display:{if empty($settings['stortype']) || $settings['stortype']=='local'} block; {else} none; {/if}"
					id="localdiv">
					<div class="layui-form-item">
						<label class="layui-form-label">图片文件后缀</label>
						<div class="layui-input-block">
							<input name="imageext" id="imageext" value="{:empty($settings['imageext']) ? 'gif, jpg, jpeg, bmp, png, ico' : $settings['imageext']}"/>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">音视频文件后缀</label>
						<div class="layui-input-block">
							<input type="text" name="videoext" id="videoext" value="{:empty($settings['videoext']) ? 'avi,mp4,mp3' : $settings['videoext']}" />
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">其他文件后缀</label>
						<div class="layui-input-block">
							<input type="text" name="otherext" id="otherext" value="{:empty($settings['otherext']) ? 'doc,xls' : $settings['otherext']}" />
						</div>
					</div>
					<div class="layui-form-item">
						<div class="layui-input-block">
						<div class="layui-form-mid layui-word-aux">
						<p>注：填写后“回车”添加，x删除项</p>
						<p>未添加的文件后缀不允许上传</p>
					</div>
				</div>
					</div>
				</div>
				<div style="display:{if !empty($settings['stortype'])&&$settings['stortype']=='qiniu' } block; {else} none; {/if}"
					id="qiniudiv">
					<div class="layui-form-item">
						<label class="layui-form-label" for="qiniu_key">七牛AccessKey</label>
						<div class="layui-input-block">
							<input type="text" name="qiniu_key" id="qiniu_key" value="{$settings['qiniu_key']}"
								class="layui-input" />
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label" for="qiniu_secret">七牛SecretKey</label>
						<div class="layui-input-block">
							<input type="text" name="qiniu_secret" id="qiniu_secret" value="{$settings['qiniu_secret']}"
								class="layui-input" />
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label" for="qiniu_storage">七牛存储空间名</label>
						<div class="layui-input-block">
							<input type="text" name="qiniu_storage" id="qiniu_storage"
								value="{$settings['qiniu_storage']}" class="layui-input" />
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label" for="qiniu_domain">七牛存储空间访问域名</label>
						<div class="layui-input-block">
							<input type="text" name="qiniu_domain" id="qiniu_domain" value="{$settings['qiniu_domain']}"
								class="layui-input" />
							<span class="layui-form-mid layui-word-aux">注意：请加上http://或者https://，另外结尾不要加/</span>
						</div>
					</div>
				</div>
				<div style="display:{if !empty($settings['stortype'])&&$settings['stortype']=='oss' } block; {else} none;{/if}"
					id="ossdiv">
					<div class="layui-form-item">
						<label class="layui-form-label" for="ali_key">阿里Access Key ID</label>
						<div class="layui-input-block">
							<input type="text" name="ali_key" id="ali_key" value="{$settings['ali_key']}"
								class="layui-input" />
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label" for="ali_secret">阿里Access Key Secret</label>
						<div class="layui-input-block">
							<input type="text" name="ali_secret" id="ali_secret" value="{$settings['ali_secret']}"
								class="layui-input" />
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label" for="ali_endpoint">阿里EndPoint</label>
						<div class="layui-input-block">
							<input type="text" name="ali_endpoint" id="ali_endpoint" value="{$settings['ali_endpoint']}"
								class="layui-input" />
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label" for="open_alitype">域名类型</label>
						<div class="layui-input-block">
							<input style="width: 15px;height: 15px;" type="radio" name="open_alitype" value="1"
								id="open_alitype1" {if empty($settings['open_alitype']) || $settings['open_alitype']==1
								}checked{/if} /><label for="open_alitype1"> 使用OSS域名</label> <input
								style="width: 15px;height: 15px;" type="radio" name="open_alitype" value="2"
								id="open_alitype2" {if $settings['open_alitype']==2 }checked{/if} /><label
								for="open_alitype2">使用自定义域名(CNAME)</label>
						</div>
					</div>
					<div class="layui-form-item aliurls"
						style="display:{if empty($settings['open_alitype']) || $settings['open_alitype']==1 } none; {else} block {/if}">
						<label class="layui-form-label" for="ali_zdyurl">自定义URL</label>
						<div class="layui-input-block">
							<input type="text" name="ali_zdyurl" id="ali_zdyurl" value="{$settings['ali_zdyurl']}"
								class="layui-input" />
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label" for="ali_storage">阿里存储空间名</label>
						<div class="layui-input-block">
							<input type="text" name="ali_storage" id="ali_storage" value="{$settings['ali_storage']}"
								class="layui-input" />
						</div>
					</div>
					<script type="text/javascript">
						$("input[type=radio][name=open_alitype]").change(function () {
							if (this.value == "2") {
								$(".aliurls").show()
							} else {
								$(".aliurls").hide()
							}
						})
					</script>
				</div>
				<div style="display:{if !empty($settings['stortype'])&&$settings['stortype']=='cos' } block; {else} none;{/if}"
					id="cosdiv">
					<div class="layui-form-item">
						<label class="layui-form-label">APPID</label>
						<div class="layui-input-block">
							<input type="text" name="cos_appid" class="layui-input" value="{$settings['cos_appid']}" />
							<div class="layui-form-mid layui-word-aux">APPID 是您项目的唯一ID</div>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">SecretID</label>
						<div class="layui-input-block">
							<input type="text" name="cos_secretid" class="layui-input"
								value="{$settings['cos_secretid']}" />
							<div class="layui-form-mid layui-word-aux">SecretID 是您项目的安全秘钥，具有该账户完全的权限，请妥善保管</div>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">SecretKEY</label>
						<div class="layui-input-block">
							<input type="text" name="cos_secretkey" class="layui-input"
								value="{$settings['cos_secretkey']}" />
							<div class="layui-form-mid layui-word-aux">SecretKEY 是您项目的安全秘钥，具有该账户完全的权限，请妥善保管</div>
						</div>
					</div>
					<div class="layui-form-item" id="cosbucket">
						<label class="layui-form-label">Bucket</label>
						<div class="layui-input-block">
							<input type="text" name="cos_bucket" class="layui-input"
								value="{$settings['cos_bucket']}" />
							<div class="layui-form-mid layui-word-aux">请保证bucket为可公共读取的</div>
						</div>
					</div>
					<div class="layui-form-item" id="cos_local">
						<label class="layui-form-label">bucket所在区域</label>
						<div class="layui-input-block">
							<div class="nice-select myselect myselect_cos">
								<input id="cos_local_text" type="text" value="{$settings['cos_local_text']}"
									name="cos_local_text" readonly />
								<input id="cos_local_val" type="hidden" value="{$settings['cos_local']}"
									name="cos_local" />
								<ul>
									<li data-value="">无</li>
									<li data-value="ap-nanjing">南京</li>
									<li data-value="ap-chengdu">成都</li>
									<li data-value="ap-beijing">北京</li>
									<li data-value="ap-guangzhou">广州</li>
									<li data-value="ap-shanghai">上海</li>
									<li data-value="ap-chongqing">重庆</li>
									<li data-value="ap-beijing-fsi">北京金融</li>
									<li data-value="ap-shanghai-fsi">上海金融</li>
									<li data-value="ap-shenzhen-fsi">深圳金融</li>
									<li data-value="ap-hongkong">香港</li>
									<li data-value="ap-singapore">新加坡</li>
									<li data-value="ap-mumbai">印度孟买</li>
									<li data-value="ap-seoul">韩国首尔</li>
									<li data-value="ap-bangkok">泰国曼谷</li>
									<li data-value="ap-tokyo">日本东京</li>
									<li data-value="eu-moscow">俄罗斯莫斯科</li>
									<li data-value="eu-frankfurt">德国法兰克</li>
									<li data-value="na-toronto">加拿大多伦多</li>
									<li data-value="na-ashburn">美东弗吉尼亚</li>
									<li data-value="na-siliconvalley">美西硅谷</li>
								</ul>
							</div>
							<div class="layui-form-mid layui-word-aux">选择bucket对应的区域，如果没有选择 无</div>
						</div>
					</div>
					<div class="layui-form-item" id="cos_ishttp">
						<label class="layui-form-label">协议</label>
						<div class="layui-input-block">
							<input style="width: 15px;height: 15px;" type="radio" name="cos_ishttp" value="http"
								id="cos_http" {if empty($settings['cos_ishttp']) || $settings['cos_ishttp']=='http'
								}checked{/if} /><label for="cos_http">http</label> <input
								style="width: 15px;height: 15px;" type="radio" name="cos_ishttp" value="https"
								id="cos_https" {if $settings['cos_ishttp']=='https' }checked{/if} /><label
								for="cos_https">https</label>
							<div class="layui-form-mid layui-word-aux"></div>
						</div>
					</div>
					<div class="layui-form-item" id="cos_domain">
						<label class="layui-form-label">加速域名</label>
						<div class="layui-input-block">
							<input type="text" name="cos_domain" class="layui-input"
								value="{$settings['cos_domain']}" />
							<div class="layui-form-mid layui-word-aux">没有CDN加速域名或自定义域名的留空</div>
						</div>
					</div>
				</div>
				<div style="display:{if !empty($settings['stortype'])&&$settings['stortype']=='bos' } block; {else} none;{/if}"
					id="bosdiv">
					<div class="layui-form-item">
						<label class="layui-form-label">Access Key</label>
						<div class="layui-input-block">
							<input type="text" name="bos_accesskry" class="layui-input" value="{$settings['bos_accesskry']}" />
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">Secret Key</label>
						<div class="layui-input-block">
							<input type="text" name="bos_secretkey" class="layui-input"
								value="{$settings['bos_secretkey']}" />
						</div>
					</div>
					<div class="layui-form-item" id="bosbucket">
						<label class="layui-form-label">Bucket</label>
						<div class="layui-input-block">
							<input type="text" name="bos_bucket" class="layui-input"
								value="{$settings['bos_bucket']}" />
							<div class="layui-form-mid layui-word-aux">请保证bucket为可公共读取的</div>
						</div>
					</div>
					<div class="layui-form-item" id="bos_local">
						<label class="layui-form-label">bucket所在区域</label>
						<div class="layui-input-block">
							<div class="nice-select myselect  myselect_bos">
								<input id="bos_local_text" type="text" value="{$settings['bos_local_text']}"
									name="bos_local_text" readonly />
								<input id="bos_local_val" type="hidden" value="{$settings['bos_local']}"
									name="bos_local" />
								<ul>
									<li data-value="bj.bcebos.com">华北-北京</li>
									<li data-value="bd.bcebos.com">华北-保定</li>
									<li data-value="su.bcebos.com">华东-苏州</li>
									<li data-value="gz.bcebos.com">华南-广州</li>
									<li data-value="hkg.bcebos.com">中国香港</li>
									<li data-value="sin.bcebos.com">新加坡</li>
									<li data-value="fwh.bcebos.com">华中金融-武汉</li>
									<li data-value="fsh.bcebos.com">华东金融-上海</li>
								</ul>
							</div>
							<div class="layui-form-mid layui-word-aux">选择bucket对应的区域</div>
						</div>
					</div>
					<div class="layui-form-item" id="bos_domain">
						<label class="layui-form-label">加速域名</label>
						<div class="layui-input-block">
							<input type="text" name="bos_domain" class="layui-input"
								value="{$settings['bos_domain']}" />
							<div class="layui-form-mid layui-word-aux">没有CDN加速域名或自定义域名的留空</div>
						</div>
					</div>
				</div>
				<div style="display:{if !empty($settings['stortype'])&&$settings['stortype']=='upyun' } block; {else} none;{/if}"
					id="upyundiv">
					<div class="layui-form-item">
						<label class="layui-form-label">服务名称</label>
						<div class="layui-input-block">
							<input type="text" name="upyun_servicename" class="layui-input" value="{$settings['upyun_servicename']}" />
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">操作员名称</label>
						<div class="layui-input-block">
							<input type="text" name="upyun_user" class="layui-input"
								value="{$settings['upyun_user']}" />
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">操作员密码</label>
						<div class="layui-input-block">
							<input type="text" name="upyun_upwd" class="layui-input"
								value="{$settings['upyun_upwd']}" />
								<div class="layui-form-mid layui-word-aux">操作员权限：写入、删除</div>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">域名</label>
						<div class="layui-input-block">
							<input type="text" name="upyun_domain" class="layui-input"
								value="{$settings['upyun_domain']}" />
							<div class="layui-form-mid layui-word-aux">加速域名</div>
						</div>
					</div>
				</div>
				<div style="display:{if !empty($settings['stortype'])&&$settings['stortype']=='obs' } block; {else} none;{/if}"
					id="obsdiv">
					<div class="layui-form-item">
						<label class="layui-form-label">Access Key</label>
						<div class="layui-input-block">
							<input type="text" name="obs_accesskey" class="layui-input" value="{$settings['obs_accesskey']}" />
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">Secret Key</label>
						<div class="layui-input-block">
							<input type="text" name="obs_secretkey" class="layui-input"
								value="{$settings['obs_secretkey']}" />
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">endpoint</label>
						<div class="layui-input-block">
							<input type="text" name="obs_endpoint" class="layui-input"
								value="{$settings['obs_endpoint']}" />
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">Bucket</label>
						<div class="layui-input-block">
							<input type="text" name="obs_bucket" class="layui-input"
								value="{$settings['obs_bucket']}" />
						</div>
					</div>
				</div>
			</div>
			<div class="layui-form-item" style="margin-top: 100px">
				<div class="layui-input-block" style="text-align: center; margin-left: -250px">
					<a href="javascript:;" class="mysubt formsubmit">提交更改</a>
				</div>
			</div>
		</form>
		<div id="savemsg" style="display: none">
			<div class="show_msg">
				<svg t="1639122179352" class="icon" style="vertical-align: middle; margin-right: 5px"
					viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1220" width="26"
					height="26">
					<path
						d="M331.30454521 511.34545479a32.72727305 32.72727305 0 0 0-47.7 44.7954539l104.64545479 111.55909131a40.90909131 40.90909131 0 0 0 56.78181826 2.78181826l293.07272695-256.58181826a32.72727305 32.72727305 0 0 0-43.11818174-49.25454521l-275.23636347 240.95454521-88.44545479-94.25454521z"
						p-id="1221" fill="#1afa29"></path>
					<path
						d="M512 953.81818174c244.02272695 0 441.81818174-197.79545479 441.81818174-441.81818174C953.81818174 267.97727305 756.02272695 70.18181826 512 70.18181826 267.97727305 70.18181826 70.18181826 267.97727305 70.18181826 512c0 244.02272695 197.79545479 441.81818174 441.81818174 441.81818174z m0-65.45454522a376.36363653 376.36363653 0 1 1 0-752.72727305 376.36363653 376.36363653 0 0 1 0 752.72727305z"
						p-id="1222" fill="#1afa29"></path>
				</svg>保存成功！
			</div>
			<div class="show_msg_ze"></div>
		</div>
	</body>
	<script>
$("input[type=radio][name=stortype]").change(function(){if(this.value=="qiniu"){$("#localdiv").hide();$("#qiniudiv").show();$("#ossdiv").hide();$("#cosdiv").hide();$("#bosdiv").hide();$("#upyundiv").hide();$("#obsdiv").hide()}else if(this.value=="oss"){$("#localdiv").hide();$("#qiniudiv").hide();$("#ossdiv").show();$("#cosdiv").hide();$("#bosdiv").hide();$("#upyundiv").hide();$("#obsdiv").hide()}else if(this.value=="cos"){$("#localdiv").hide();$("#qiniudiv").hide();$("#ossdiv").hide();$("#cosdiv").show();$("#bosdiv").hide();$("#upyundiv").hide();$("#obsdiv").hide()}else if(this.value=="bos"){$("#localdiv").hide();$("#qiniudiv").hide();$("#ossdiv").hide();$("#cosdiv").hide();$("#bosdiv").show();$("#upyundiv").hide();$("#obsdiv").hide()}else if(this.value=="upyun"){$("#localdiv").hide();$("#qiniudiv").hide();$("#ossdiv").hide();$("#cosdiv").hide();$("#bosdiv").hide();$("#upyundiv").show();$("#obsdiv").hide()}else if(this.value=="obs"){$("#localdiv").hide();$("#qiniudiv").hide();$("#ossdiv").hide();$("#cosdiv").hide();$("#bosdiv").hide();$("#upyundiv").hide();$("#obsdiv").show()}else{$("#localdiv").show();$("#qiniudiv").hide();$("#ossdiv").hide();$("#cosdiv").hide();$("#bosdiv").hide();$("#upyundiv").hide();$("#obsdiv").hide()}});$(".myselect").click(function(e){if($(this).find("ul").css("display")=="none"){$(this).find("ul").show()}else{$(this).find("ul").hide()}e.stopPropagation()});$(".myselect li").hover(function(e){$(this).toggleClass("on");e.stopPropagation()});$(".myselect_cos li").click(function(e){$(this).parents(".myselect").find("#cos_local_val").val($(this).attr("data-value"));$(this).parents(".myselect").find("#cos_local_text").val($(this).text());$(".myselect ul").hide();e.stopPropagation()});$(".myselect_bos li").click(function(e){$(this).parents(".myselect").find("#bos_local_val").val($(this).attr("data-value"));$(this).parents(".myselect").find("#bos_local_text").val($(this).text());$(".myselect ul").hide();e.stopPropagation()});$(document).click(function(){$(".myselect ul").hide()});$(".formsubmit").on("click",function(){$.post('{:url("store/save")}',$("#storeform").serialize(),function(res){$("#savemsg").show();setTimeout(function(){$("#savemsg").hide();location.reload()},1500)})});
</script>
	<script>
		$(function(){$('#imageext').tagsInput({defaultText:'添加后缀',width:'auto'});$('#videoext').tagsInput({defaultText:'添加后缀',width:'auto'});$('#otherext').tagsInput({defaultText:'添加后缀',width:'auto'})});
	</script>

</html>
