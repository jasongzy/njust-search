#!/usr/bin/env python
# from time import sleep

from selenium import webdriver

options = webdriver.ChromeOptions()
options.add_argument(
    'user-agent="Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36"'
)
options.add_argument("--no-sandbox")
options.add_argument("--disable-dev-shm-usage")
options.add_argument("--headless")
options.add_argument("--disable-gpu")
options.add_argument("--ignore-certificate-errors")
driver = webdriver.Chrome(chrome_options=options)
driver.set_page_load_timeout(20)
driver.set_script_timeout(20)

# 登录NJUST VPN
driver.get("https://vpn.njust.edu.cn/")
# sleep(2)
driver.find_element_by_id("username").send_keys("9171040GXXXX")
driver.find_element_by_id("password").send_keys("pw")
remember_me = driver.find_element_by_id("rememberMe")
if not remember_me.is_selected():
    remember_me.click()
driver.find_element_by_id("login_submit").click()
# sleep(5)

# 登录研讨室预约系统
try:
    driver.get("https://vpn.njust.edu.cn/web/1/http/0/202.119.83.29/xabseat/Login.aspx")
    driver.find_element_by_id("txtUserName").send_keys("9171040G0814")
    # driver.find_element_by_id("txtPassword").send_keys("")
    driver.find_element_by_id("BtnLogin").click()
    # sleep(5)
    # driver.save_screenshot("chromedriver.png")
except:
    pass

cookies = driver.get_cookies()
# 保存为Headers里的格式
cookie_list = [item["name"] + "=" + item["value"] for item in cookies]
# join()连接字符串数组。将字符串、元组、列表中的元素以指定的字符(分隔符)连接生成一个新的字符串
cookiestr = ";".join(item for item in cookie_list)
print(cookiestr)
with open("njust_cookie.txt", "w") as file:
    try:
        file.write(cookiestr)
    except:
        file.close()

driver.quit()
