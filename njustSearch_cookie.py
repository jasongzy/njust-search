#!/usr/bin/python3
import json
import os
import sys

import requests

with open("njust_cookie.txt", "r") as file:
    cookie = file.read()

urlLogin = "https://vpn.njust.edu.cn/web/1/http/0/202.119.83.29/xabseat/Login.aspx"
urlMain = "https://vpn.njust.edu.cn/web/1/http/1/202.119.83.29/xabseat/Main.aspx"
urlSearch = "https://vpn.njust.edu.cn/web/1/http/0/202.119.83.29/xabseat/AllAspx/PC_SmallRoom/Ajax.ashx"
headers = {
    "User-Agent": "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36",
    "Cookie": cookie,
}
mySession = requests.session()

# 登录检查
responseLogin = mySession.get(urlMain, headers=headers, verify=False).content.decode(
    "UTF-8"
)
if "注销" in responseLogin:
    print("登录成功！")
else:
    print("登录失败！尝试重新获取cookie...")
    # sys.exit()
    os.system("njustSearch_getcookie.py")
    with open("njust_cookie.txt", "r") as file:
        cookie = file.read()
    headers["Cookie"] = cookie
    responseLogin = mySession.get(
        urlMain, headers=headers, verify=False
    ).content.decode("UTF-8")
    if "注销" in responseLogin:
        print("登录成功！")
    else:
        print("登录失败！")
        sys.exit()

# POST查询
if len(sys.argv) >= 2:
    keyword = sys.argv[1]
else:
    keyword = input("请输入关键词：")
response = mySession.post(
    urlSearch, data={"key": "SGetMenber", "type": "1", "val": keyword}, headers=headers
).content
# response = response.decode("UTF-8")
result_dic = json.loads(response)

if len(sys.argv) >= 2:
    print(result_dic["ulist"])
else:
    print("-" * 20)
    print("Name\tID")
    print("-" * 20)
    for item in result_dic["ulist"]:
        print(item["name"], end="\t")
        print(item["code"])
    print("-" * 20)
