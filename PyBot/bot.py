import telebot
import config
import _json

bot = telebot.TeleBot(config.TOKEN)
# string const
string_GiveMeToken = 'Для начала работы, пришлите логин и через пробел код, выданный в личном кабинете.'
string_LoginUncorrect = 'Данные введены не корректно. Проверьте и отправьте снова.'
string_LoginError = 'Ошибка верификации на стадии проверки. Проверьте и переотправьте данные.'
string_LoginSucsess = "Аккаунт успешно подтверждён!"
string_Dalee = "Что далее?"
# user

login = "user"
code = ""
chatId = -1
namesRecipes = []  # 'string'
userId = ""
listSize = 3
listIdBegin = 0
listIdEnd = listSize

# bool
isLogin = False

test1 = {
    "id": "1",
    "name": "bulka",
    "recpit": "2"
}
test2 = {
    "id": "2",
    "name": "bulka2",
    "recpit": "23"
}
test3 = {
    "id": "3",
    "name": "bulka3",
    "recpit": "24"
}
test4 = {
    "id": "4",
    "name": "bulka4",
    "recpit": "24"
}
test5 = {
    "id": "5",
    "name": "bulka5",
    "recpit": "24"
}

# temp
# recipes: id, name, recip

# button
string_ShowRecipesList = "Просмотреть все рецепты"
string_Exit = "Выйти"
string_NextIdList = "Следющий лист"
string_PreIdList = "Предыдущий лист"

# keyboard
markup1 = telebot.types.ReplyKeyboardMarkup(resize_keyboard=True)
buttonGetAllRecept = telebot.types.KeyboardButton(string_ShowRecipesList)
buttonExit = telebot.types.KeyboardButton(string_Exit)

markup2 = telebot.types.ReplyKeyboardMarkup(resize_keyboard=True)
buttonAddIdList = telebot.types.KeyboardButton(string_NextIdList)
buttonPreIdList = telebot.types.KeyboardButton(string_PreIdList)

markupNull = telebot.types.ReplyKeyboardRemove()
markup1.add(buttonGetAllRecept, buttonExit)
markup2.add(buttonAddIdList, buttonPreIdList)


@bot.message_handler(commands=['start'])
def StartBot(message):
    if not isLogin:
        global chatId
        chatId = message.chat.id
        global userId
        userId = "1"
        # message.user.id
        bot.send_message(chatId, string_GiveMeToken)


@bot.message_handler(content_types=['text'])
def SendToBotLoginCode(message):
    global isLogin
    global code
    global login
    if not isLogin:
        check = len(message.text.split())
        if check == 2:
            SendLoginCode(message.text)
        else:
            bot.send_message(chatId, string_LoginUncorrect)
    else:
        global listIdBegin
        global listIdEnd
        if message.chat.type == 'private':
            if message.text == string_ShowRecipesList:
                bot.send_message(chatId, showRecipeList(), reply_markup=markup1)

            elif message.text == string_Exit:

                bot.send_message(chatId, "Выход. Отправьте /start чтобы начать с начала", reply_markup=markupNull)
                isLogin = False
                ResetValues()

            elif message.text == string_NextIdList:
                listIdBegin += listSize
                listIdEnd += listSize
                if listIdBegin > len(namesRecipes) - 1:
                    listIdBegin = len(namesRecipes) - 1
                    listIdEnd = len(namesRecipes)
                bot.send_message(chatId, showRecipeList(), reply_markup=markup2)

            elif message.text == string_NextIdList:
                listIdBegin -= listSize
                listIdEnd -= listSize
                if listIdBegin < 0:
                    listIdBegin = 0
                    listIdEnd = listSize
                bot.send_message(chatId, showRecipeList(), reply_markup=markup2)

            else:
                bot.send_message(chatId, "Команда не распознана.")


def ResetValues():
    global login
    login = "user"
    global code
    code = ""
    global chatId
    chatId = -1
    global namesRecipes
    namesRecipes = []  # 'string'
    global userId
    userId = ""
    global listIdBegin
    listIdBegin = 0
    global listIdEnd
    listIdEnd = listSize


# ЗАГЛУШКА
def isTryUser(_json):
    # ЗАГЛУШКА send on server _json, returns true/false
    answerFromServer = True
    return answerFromServer


# ЗАГЛУШКА
def ConvertToJSONLoginCode(_loginCode):
    arr = _loginCode.split()
    # ЗАГЛУШКА convert string to json
    string = "convert string to json"
    return string


# ЗАГЛУШКА
def ConvertToJSONUserID(_userId):
    # ЗАГЛУШКА convert userId to json
    string = "convert string to json"
    return string


def GetRecipesFromServer(_userId):
    # call to server...and convert json to list
    list = [test1, test2, test3, test4, test5]  # string
    return list


def SendLoginCode(_loginCode):
    global isLogin
    global namesRecipes
    if isTryUser(ConvertToJSONLoginCode(_loginCode)):
        isLogin = True
        namesRecipes = GetRecipesFromServer(userId)
        bot.send_message(chatId, string_LoginSucsess+'\n'+string_Dalee, reply_markup=markup1)
        bot.send_message(chatId, showRecipeList(), reply_markup=markup1)
    else:
        isLogin = False
        bot.send_message(chatId, string_LoginError)


def showRecipeList():
    stringOut = ""
    try:
        for i in range(listIdBegin, listIdEnd):
            stringOut = stringOut + namesRecipes[i] + '\n'
    except BaseException:
        return stringOut
    return stringOut


# run
bot.polling(none_stop=True)
