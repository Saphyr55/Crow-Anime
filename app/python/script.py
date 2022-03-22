import json
from selenium import webdriver
from selenium.webdriver.common.by import By

name_work = "My Teen Romantic Comedy SNAFU"
id_anime = 0
is_anime = True
is_manga = False

# recupere la page de l'anime ou manga
driver = webdriver.Chrome(executable_path="app/python/chromedriver")
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
url_image_anime = driver.find_elements(By.CLASS_NAME, "lazyloaded")[0].get_attribute("src")
json_url_image_anime = {
    "url" : url_image_anime
}

with open(f"assets/img/{work}/54x74/{id_anime}.json", "w") as file_json_url_image_anime:
    json.dump(json_url_image_anime, file_json_url_image_anime, indent=2)

driver.implicitly_wait(3)
driver.get(url_anime)
url_image_anime = driver.find_elements(By.CLASS_NAME, "lazyloaded")[0].get_attribute("src")
json_url_image_anime = {
    "url" : url_image_anime
}

with open(f"assets/img/{work}/225x316/{id_anime}.json", "w") as file_json_url_image_anime:
    json.dump(json_url_image_anime, file_json_url_image_anime, indent=2)

driver.implicitly_wait(3)
driver.quit()
