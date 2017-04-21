number_of_position = int(input())

position = dict()



for i in range(number_of_position):

    number, received_number = [int(j) for j in input().strip().split(',')]

    position[ number ] = [received_number]



number_of_user = int(input())

Position_of_user = [0]*130

status_of_user = [1]*130 

user = dict()

for i in range(number_of_user):

    ID, position_1, position_2, position_3 = [int(j) for j in input().strip().split(',')]

    user[ ID ] = [position_1, position_2, position_3]



score = dict()

for i in range(number_of_user):

    ID, score_1, score_2, score_3 = [int(j) for j in input().strip().split(',')]

    score[ ID ] = [score_1, score_2, score_3]



check = True

while check:

    check = False

    for ID in user:

        if status_of_user[ID] == 1:

            status_of_user[ID] = 0 

            if Position_of_user[ID] == 3 or user[ID][ Position_of_user[ID] ] == 0:

                continue

            position[ user[ID][ Position_of_user[ID] ]] += [(ID, score[ ID ][ Position_of_user[ID ]])]

    for ID_of_position in position:

        sort = position[ ID_of_position ][1:]

        sort.sort(key = lambda x: x[1],reverse = True)

        position[ ID_of_position ][1:] = sort[:]

        length = len(position[ ID_of_position ])

        if length > position[ID_of_position][0]:

            for i in range(position[ID_of_position][0] + 1, length):

                status_of_user[ position[ID_of_position][i][0] ] = 1

                if Position_of_user[ position[ID_of_position][i][0] ] < 3:

                    Position_of_user[ position[ID_of_position][i][0] ] += 1

                    check = True

        position[ ID_of_position ] = position[ ID_of_position ][:position[ ID_of_position ][0] + 1]



for ID in user:

    if Position_of_user[ID] < 3:

        print(str(ID) + ',' + str(user[ID][ Position_of_user[ID] ]))

    else:

        print(str(ID) + ',0')
