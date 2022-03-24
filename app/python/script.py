import json
import os
from pathlib import Path
from os import path
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.chrome.options import Options

path_parent = str(Path(f"{__file__}").parent)
with open(path_parent+"/../../assets/data/work.json") as work:
    data = json.load(work)

name_work = data['name_work']
id_work = data['id_work']
is_anime = data['is_anime']
is_manga = data['is_manga']

# recupere la page de l'anime ou manga

options = Options()
options.add_argument("--headless")

driver = webdriver.Chrome(executable_path=path_parent+"/../../app/python/chromedriver", options=options)
driver.get("https://myanimelist.net/search/all?q="+name_work)
driver.implicitly_wait(3)

if(is_anime):
    work = "anime"
elif(is_manga):
    work = "manga"
else:
    raise ValueError("Oeuvre n'est ni un anime ni un manga")

all_animes = driver.find_elements(By.CLASS_NAME ,"hoverinfo_trigger")
url_anime = all_animes[0].get_attribute("href")

# recupere la url de l'image de l'anime de profil et l'enregistre dans fichier json
def create_json_url_image(format):
    url_image_anime = driver.find_elements(By.CLASS_NAME, "lazyloaded")[0].get_attribute("src")
    json_url_image_anime = {
        "url" : url_image_anime
    }
    with open(path_parent+f"/../../assets/img/{work}/{format}/{id_work}.json", "w") as file_json_url_image_anime:
        json.dump(json_url_image_anime, file_json_url_image_anime, indent=2)


create_json_url_image(format="54x74")
driver.implicitly_wait(3)
driver.get(url_anime)
create_json_url_image(format="225x316")


driver.implicitly_wait(3)
driver.quit()