import re
from bottle import request, route, run, static_file


class NotDoge:
    def __getitem__(self, item):
        return True


def encode_chr(s):  #
    if 0 <= s <= 9:
        return chr(s + 48)  # 48 ~ 57  0 ~ 9
    elif 10 <= s <= 35:
        return chr(s + 87)  # 97 ~ 122  a ~ z
    elif 36 <= s <= 61:
        return chr(s + 29)  # 65 ~ 90  A ~ Z
    elif 62 <= s <= 109:
        return chr(s - 62)  # 0 ~ 47  0x00(Null) ~ 0x2F(/)
    elif 110 <= s <= 116:
        return chr(s - 52)  # 58 ~ 64  0x3A(:) ~ 0x40(@)
    elif 117 <= s <= 122:
        return chr(s - 26)  # 91 ~ 96  0x5B([) ~ 0x60(`)
    else:
        return chr(s)  # other ascii characters


def split(s):
    result = []
    spliting = ""
    i = 0
    while i < len(s):
        if s[i:i + 4] == '   d' and s[i-1] != ' ':
            result.append(spliting)
            spliting = ""
            i += 3
        else:
            spliting += s[i]
            i += 1
    result.append(spliting)
    return result


def encoding(s):
    result = ""
    for i in re.split('\n', s):
        if i == '':
            pass
        else:
            for letter in split(i):
                if letter in ['  ', 'dOGE  ', 'dOGE  DOGE', '  DOGE']:
                    result += "1"
                else:
                    encoding_num = 0
                    encoding_split = re.split(' {2}', letter)
                    for j in range(len(encoding_split)):
                        for k in re.split(' ', encoding_split[j]):
                            if k == 'doge':
                                encoding_num <<= 1
                                encoding_num += 1
                            elif k in ['DOGE', 'dOGE']:
                                pass
                            else:
                                if k != '':
                                    return NotDoge()
                        if j != len(encoding_split) - 1:
                            encoding_num <<= 1
                    result += encode_chr(encoding_num)
        result += '\n'
    return result


@route('/')
def index():
	return static_file('index.html', './')

@route('/command')
def command():
	value = request.query.value
	return 'Value was set to: ' + value

run(host='0.0.0.0', port=8000, debug=True)
#encoding_string = input()
#while encoding_string[-3:] != '\n\n\n':
#	encoding_string += '\n' + input()
#encoding_string = encoding_string[:-3]
#encoded_result = encoding(encoding_string)
#print('====================[Dogey encoded result]====================')
#if type(encoded_result[0]) == bool:
#	print('||              [Errno 0x00000001] Not Doge!!!              ||')
#else:
#	print(encoded_result)
#print('==============================================================')
#if type(encoded_result[0]) == str:
#	print()
#	print('====================[Dogey running console]====================')
#	try:
#		exec(encoded_result)
#	except Exception as e:
#		print('[Errno 0x00000002] Runtime Error: ' + str(e))
#	print('===============================================================')
