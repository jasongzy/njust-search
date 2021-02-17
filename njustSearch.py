#!/usr/bin/python3
import json
import sys

import requests
from bs4 import BeautifulSoup

urlLogin = "http://202.119.83.29/xabseat/Login.aspx"
urlSearch = "http://202.119.83.29/xabseat/AllAspx/PC_SmallRoom/Ajax.ashx"
headers = {
    "User-Agent": "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36"
}
mySession = requests.session()

# 获取两个校验值
tmpPage = requests.get(urlLogin).content
soup = BeautifulSoup(tmpPage, "lxml")
data1 = soup.find("input", {"id": "__VIEWSTATE"}).attrs["value"]
data2 = soup.find("input", {"id": "__EVENTVALIDATION"}).attrs["value"]

# 登录研讨室预约系统
responseLogin = mySession.post(
    urlLogin,
    data={
        "__VIEWSTATE": data1,
        "__EVENTVALIDATION": data2,
        "txtUserName": "9171040GXXXX",
        "txtPassword": "",
        "BtnLogin": "登录",
    },
).content
responseLogin = responseLogin.decode("UTF-8")
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
    urlSearch,
    data={"key": "SGetMenber", "type": "1", "val": keyword},
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
