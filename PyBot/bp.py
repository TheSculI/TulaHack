import telebot
import config
import json

bot = telebot.TeleBot(config.TOKEN)
AllUsers = []

test1 = """{
    "id": "1",
    "name": "bulka",
    "recpit": "2"
}"""
test2 = """{
    "id": "2",
    "name": "bulka2",
    "recpit": "23"
}"""
test3 = """{
    "id": "3",
    "name": "bulka3",
    "recpit": "24"
}"""
test4 = """{
    "id": "4",
    "name": "bulka4",
    "recpit": "24"
}"""
test5 = """{
    "id": "5",
    "name": "bulka5",
    "recpit": "24"
}"""


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


class TestJSON:
    test1 = """{
        "id": "1",
        "name": "bulka",
        "recpit": "22"
    }"""
    test2 = """{
        "id": "2",
        "name": "bulka2",
        "recpit": "23"
    }"""
    test3 = """{
        "id": "3",
        "name": "bulka3",
        "recpit": "25"
    }"""
    test4 = """{
        "id": "4",
        "name": "bulka4",
        "recpit": "26"
    }"""
    test5 = """{
        "id": "5",
        "name": "bulka5",
        "recpit": "27"
    }"""


class User:
    isLogin = False
    chatId = -1

    def __init__(self, _chatId):
        isLogin = False
        chatId = _chatId

    def GetUser(self, chatId):
        for us in AllUsers:
            if us.chatId == chatId:
                return us
        return None


class FromToServer:
    @staticmethod
    def SendLoginCode(self, jsonString):
        #Send to server jsonString
        return True #/False


class RecipesList:
    listSize = 3
    listIdBegin = 0
    listIdEnd = listSize

    recipesList = []


@bot.message_handler(commands=['start'])
def StartBot(message):
    if AllUsers.count(message.chat.id) < 1:
        d = {message.chat.id: False}
        AllUsers.append(d)
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
                                 StringConst.string_LoginSucsess+StringConst.string_WhatNext,
                                 reply_markup=markup1)

        else:
            bot.send_message(message.chat.id, StringConst.string_LoginError)
    else:
        if message.chat.type == 'private':
            pass

# run
bot.polling(none_stop=True)
