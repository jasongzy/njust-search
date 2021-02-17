# NJUST 师生/校友搜索引擎

利用 NJUST 的「[图书馆研修小间管理系统](http://202.119.83.29/xabseat/Login.aspx)」中的一个接口，对全校历史上所有录入过系统的师生、校友进行姓名、学号（工号）的搜索查询。支持 shell 下直接输出格式化的搜索结果，也提供了基于 PHP 的 Web 查询界面。

## 依赖

- Python 3
- requests
- beautifulsoup4
- selenium
- chromedriver
- PHP

## 部署

在校园网环境下部署时，需要获得一个合法的学号以登录图书馆研修小间管理系统，并相应修改 `njustSearch.py` 中的以下内容：

```python
data={
        "__VIEWSTATE": data1,
        "__EVENTVALIDATION": data2,
        "txtUserName": "9171040GXXXX", # 学号
        "txtPassword": "", # 密码（初始为空）
        "BtnLogin": "登录",
    },
```

若需要从外网访问，还需要一套可登录学校「[智慧理工服务门户](http://ehall.njust.edu.cn/new/index.html)」系统（统一身份认证）的学号及密码，并修改 `njustSearch_getcookie.py` 中的以下内容：

```python
# 学号
driver.find_element_by_id("username").send_keys("9171040GXXXX")
# 密码
driver.find_element_by_id("password").send_keys("pw")
```

PHP 默认调用的是外网版脚本 `njustSearch_cookie.py`。在内网下使用只需修改 `njust-search.php` 中的调用文件名为 `njustSearch.py` 即可：

```php
$data_str = exec('njustSearch.py ' . $_POST['keyword'] . '"');
```

注意： `.py` 后的空格请保留。

## 注意

- 支持关键词的部分匹配
- 图书馆研修小间管理系统仅可从校园网访问，因此在内网环境下可直接访问接口请求数据，速度较快；从外网访问则需要先使用无头浏览器模拟登录学校 VPN 系统并获取 cookie，因此初次使用时速度较慢。成功登录 VPN 后会保存本次获得的 cookie 值，在此 cookie 过期前，外网搜索速度将与内网相近
- 由于接口限制，当关键词太模糊时，只能搜索到前 10 条结果
