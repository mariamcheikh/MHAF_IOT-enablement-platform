from pymongo import MongoClient
import pandas as pd
import csv
import json

MONGO_HOST= 'mongodb://localhost/mhaf_iot'
dbs=MongoClient().database_names()
dbs
print(dbs)
connection = MongoClient('localhost',27017)

#Generate Devices CSV
collectionname ='devices'
collection=connection['mhaf_iot'][collectionname]
ma3loumet=collection.find()
d=[]
for i in ma3loumet:
    d.append([i['_id'],i['name'],i['longitude'],i['latitude'],i['description'],i['templates_id'],i['status'],i['last_time']])
data=pd.DataFrame(data=d,columns=['devices_id','devices_name','devices_longitude','devices_latitude','devices_description','devices_templates_id','devices_status','devices_last_time'])
print(data.tail())
data.to_csv("Devices.csv")

#Generate DataType CSV
collectionname ='datatypes'
collection=connection['mhaf_iot'][collectionname]
ma3loumet=collection.find()
d=[]
for i in ma3loumet:
    d.append([i['_id'],i['data_type_name'],i['data_type_unit'],i['data_type_type']])
data=pd.DataFrame(data=d,columns=['datatypes_id','data_type_name','data_type_unit','data_type_type'])
print(data.tail())
data.to_csv("Datatypes.csv")

#Generate Template CSV
collectionname ='templates'
collection=connection['mhaf_iot'][collectionname]
ma3loumet=collection.find()
d=[]
for i in ma3loumet:
    d.append([i['_id'],i['name'],i['location'],i['timezone'],['description'],['noOfPackets'],['timePeriod'],['dataSource'],['login'],['pwd'],['MQTTTopic'],['unity'],['datagroups']])
data=pd.DataFrame(data=d,columns=['templates_id','templates_name','templates_location','templates_timezone','templates_description',
'templates_noOfPackets','templates_timePeriod','templates_dataSource'
,'templates_login','templates_pwd','templates_MQTTTopic','templates_unity','templates_datagroups'])
print(data.tail())
data.to_csv("Templates.csv")


#Generate DataGroups CSV
collectionname ='data_groups'
collection=connection['mhaf_iot'][collectionname]
ma3loumet=collection.find()
d=[]
for i in ma3loumet:
    d.append([i['_id'],i['name'],i['description'],i['accuracy'],['time_period'],['time_unit'],['action'],['datatypes']])
data=pd.DataFrame(data=d,columns=['DataGroups_id','DataGroups_name','DataGroups_description','DataGroups_accuracy',
    'DataGroups_time_period','DataGroups_time_unit','DataGroups_action','DataGroups_datatypes'])
print(data.tail())
data.to_csv("DataGroups.csv")




#All Data
data=pd.read_csv("C:/Users/Mariam/Desktop/4SIM4/2eme Semestre/PIM/PIM/DevicesUpolad.csv",sep=";")
data.head()
MONGO_HOST= 'mongodb://localhost/mhaf_iot'
MONGO_PORT=27017

client = MongoClient(MONGO_HOST)
db = client.mhaf_iot
test=json.loads(data.T.to_json()).values()
db.devices.insert(test)
#db.insert(data.to_dict('devices'))
            
    




