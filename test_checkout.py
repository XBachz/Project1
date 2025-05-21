from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.chrome.service import Service
from webdriver_manager.chrome import ChromeDriverManager
import time

service = Service(ChromeDriverManager().install())
driver = webdriver.Chrome(service=service)

driver.get("http://localhost/book/dangky.php")  # Thay bằng URL thật
driver.maximize_window()

time.sleep(2)  # Đợi trang load

driver.find_element(By.ID, "txtname").send_keys("Nguyen Van KD")
driver.find_element(By.ID, "txtmail").send_keys("HOasa@example.com")
driver.find_element(By.ID, "txtpass").send_keys("12345678")
driver.find_element(By.ID, "txtconfirm").send_keys("12345678")

# Gửi form
driver.find_element(By.CLASS_NAME, "submit-btn").click()

# Đợi xem kết quả
time.sleep(5)

# Đóng trình duyệt
driver.quit()
