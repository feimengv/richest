var Repast = {};

Repast.Image = {
	original: function(url) {
		var original = document.getElementById('original');
		
		if(!original) {
			original =  document.createElement('div');

			original.id = 'original';
			original.style.cssText = 'position:fixed;left:0;top:0;width:100%;height:120%;z-index:21;background-color:rgba(0,0,0,0.9);background-size:96%;background-repeat:no-repeat;background-position:center 40%;';
			document.body.appendChild(original);
			
			original.addEventListener('touchend', function() {
				original.style.display = 'none';
			}, false);
		}
		
		original.style.backgroundImage = 'url(' + url + ')';
		original.style.display = 'block';
	}
};
var Ajax ={};
Ajax = {
		delegate: function(event, config) {
			if (config) {
				var e = event || window.event,
				target = e.target || e.srcElement,
				bag = config.bag || {};
				bag.target = target;
				$.ajax({
					statusCode: {
						401 : function() {
							alert('当前登录已无效，请重新登录');
						}
					},
					url: config.url,
					data: config.parameters || {},
					type: config.mode || 'GET',
					success: function(result) {
						config.success && config.success.call(this, result, bag);
					}
				});
			} else {
				$.ajax({
					statusCode: {
						401 : function() {
							alert('当前登录已无效，请重新登录');
						}
					},
					url: event.url,
					data: event.parameters || {},
					type: event.mode || 'GET',
					success: function(result) {
						event.success && event.success.call(this, result, event.bag || {});
					}
				});
			}
		}
	};

Repast.Cascade = {
		_trigger: false,
		
		initialize: function(container, url, parameters, auto) {
			this._container = jQuery('#' + container);
			this._url = url;
			
			this._parameters = parameters || { pageSize: 10, pageNo: 1 };
			
			!this._parameters.pageSize && (this._parameters.pageSize = 10);
			!this._parameters.pageNo && (this._parameters.pageNo = 1);
			
			this._container.append('<div id="' + container + '-list"></div><div id="' + container + '-active" class="cascade-active">加载更多</div>');

			this._container = jQuery('#' + container + '-list');

			this._active = jQuery('#' + container + '-active').bind('click', Repast.Cascade._request);
		},
		clear: function() {
			Repast.Cascade._container.empty();
			Repast.Cascade._parameters.pageNo = 1;
		},
		cutout: function() {
			Repast.Cascade._active.unbind('click', Repast.Cascade._request);
		},
		_request: function() {
			if(!Repast.Cascade._trigger) {
				Repast.Cascade._trigger = true;

				jQuery.ajax({
					url: Repast.Cascade._url,
					dataType: 'HTML',
					data: Repast.Cascade._parameters,
					beforeSend :function(){
						$('#container-active').text("加载中....");
					},
					error:function(){
						$('#container-active').text("服务求异常");
					},
					success: function(html) {
						html = html.replace(/(^\s*)|(\s*$)/g,"");
						//当没有数据的时候，隐藏加载框，取消点击事件
						if(html == '' || html == null){
							$('#container-active').text("已经加载到最底部");
							$('#container-active').hide();
						}
						Repast.Cascade._container.append(html);

						Repast.Cascade._parameters.pageNo++;
					},
					complete: function() {
						Repast.Cascade._trigger = false;
						$('#container-active').text("加载更多");
					}
				});
			}
		}
	};