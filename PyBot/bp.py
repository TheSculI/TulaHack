import telebot
import config
import json

bot = telebot.TeleBot(config.TOKEN)
AllUsers = {}


class StringConst:
    string_GiveMeToken = 'Для начала работы, пришлите логин и через пробел код, выданный в личном кабинете.'
    string_LoginUncorrect = 'Данные введены не корректно. Проверьте и отправьте снова.'
    string_LoginError = 'Ошибка верификации на стадии проверки. Проверьте и переотправьте данные.'
    string_LoginSucsess = "Аккаунт успешно подтверждён!"
    string_WhatNext = "Что далее?"

    string_ShowRecipesList = "Просмотреть все рецепты"
    string_Exit = "Выйти"
    string_NextIdList = "Следющий лист"
    string_PreIdList = "Предыдущий лист"


# keyboard
markup1 = telebot.types.ReplyKeyboardMarkup(resize_keyboard=True)
buttonGetAllRecept = telebot.types.KeyboardButton(StringConst.string_ShowRecipesList)
buttonExit = telebot.types.KeyboardButton(StringConst.string_Exit)

markup2 = telebot.types.ReplyKeyboardMarkup(resize_keyboard=True)
buttonAddIdList = telebot.types.KeyboardButton(StringConst.string_NextIdList)
buttonPreIdList = telebot.types.KeyboardButton(StringConst.string_PreIdList)

markupNull = telebot.types.ReplyKeyboardRemove()
markup1.add(buttonGetAllRecept, buttonExit)
markup2.add(buttonAddIdList, buttonPreIdList)


class User:
    isLogin = False

    def __init__(self):
        isLogin = False

    def GetUser(self, chatId):
        for us in AllUsers:
            if us.chatId == chatId:
                return us
        return None


class FromToServer:
    @staticmethod
    def SendLoginCode(jsonString):
        # Send to server jsonString
        # Ans of server - true/false >>
        ans = True
        return ans

    @staticmethod
    def ViewRecipes(_id):
        # Call server on _id give json { id, name, recNum } >>
        fromToServerToLove = """ 
                {
                    "recipes":[   
                        {
                            "id" : 1,
                            "name" : "Recept1",
                            "recNum" : 1                    
                        },
                        {
                            "id" : 2,
                            "name" : "Recept2",
                            "recNum" : 2                    
                        },
                        {
                            "id" : 3,
                            "name" : "Recept3",
                            "recNum" : 3              
                        },
                        {
                            "id" : 6,
                            "name" : "Recept6",
                            "recNum" : 6                
                        },
                        {
                            "id" : 7,
                            "name" : "Recept7",
                            "recNum" : 7                    
                        }    
                    ] 
                }
                """
        dic = json.loads(fromToServerToLove)
        strOut = ""
        for i in range(0, len(dic["recipes"])):
            strOut += dic["recipes"][i]["recNum"] + " " + dic["recipes"][i]["name"] + '\n'
        return strOut


class RecipesList:
    pass
    # listSize = 5
    # listIdBegin = 0
    # listIdEnd = listSize


@bot.message_handler(commands=['start'])
def StartBot(message):
    if not AllUsers.get(message.chat.id):
        d = {message.chat.id: User()}
        AllUsers.update(d)
    else:
        if not AllUsers[message.chat.id].isLogin:
            bot.send_message(message.chat.id, StringConst.string_GiveMeToken)


@bot.message_handler(content_types=['text'])
def SendToBotLoginCode(message):
    if not AllUsers[message.chat.id].isLogin:
        if len(message.text.split()) == 2:
            if FromToServer.SendLoginCode(json.dumps(message.text)):
                AllUsers[message.chat.id].isLogin = True
                bot.send_message(message.chat.id,
                                 StringConst.string_LoginSucsess + StringConst.string_WhatNext,
                                 reply_markup=markup1)
            else:
                bot.send_message(message.chat.id, StringConst.string_LoginError)
        else:
            bot.send_message(message.chat.id, StringConst.string_LoginUncorrect)
    else:
        if message.chat.type == 'private':
            if message.text == StringConst.string_ShowRecipesList:
                bot.send_message(message.chat.id,
                                 FromToServer.ViewRecipes(message.chat.id),
                                 reply_markup=markup1)
            elif message.text == StringConst.string_Exit:
                bot.send_message(message.chat.id,
                                 "Выход. Отправьте /start чтобы начать с начала",
                                 reply_markup=markupNull)
                AllUsers.pop(message.chat.id)
            else:
                bot.send_message(message.chat.id, "Команда не распознана.")


# run
bot.polling(none_stop=True)
