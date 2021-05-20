# CONFIG
import sys
pathToFile = '/home/zenith/Documents/tso/CCVRP instances/VRPNC1m.TXT'
pathToFile = sys.argv[1]
# pathToFile = '/home/zenith/Documents/tso/CCVRP instances/test.TXT'
verbose = 0
# make sure to add at least as many as nbTrip value
colors = ['#800000','#FF4500','#FFFF00','#32CD32','#00CED1','#1E90FF','#8A2BE2','#FF00FF','#708090','#000000','#F08080','#B8860B','#00FFFF','#191970','#DDA0DD','#FF69B4','#D2691E','#B0C4DE','#808080','#00FF7F']

# END OF CONFIG

import math
import matplotlib.pyplot

# PROGRAM ASSUMES FIRST COORDS CORRESPOND TO DEPOT

# -------------------------------------------- File Parser

lines = []
if verbose == 1:
    print('\nOpening file...')
with open(pathToFile) as file:
    if verbose == 1:
        print('Reading file...')
    lines = file.readlines()
    if verbose == 1:
        print('Done!\nClosing file now.\n')
    file.close()

nbClients = int(lines[0].split(': ')[1])
if verbose == 1:
    print('nbClients = '+str(nbClients))
nbTrips = int(lines[1].split(': ')[1])
if verbose == 1:
    print('nbTrips = '+str(nbTrips))
vehCap = int(lines[2].split(' ')[1])
if verbose == 1:
    print('vehCap = '+str(vehCap))

demands = []
for i in range(len(lines[4].split('\t'))):
    if i == 0:
        demands.append(0)
    demands.append(int(lines[4].split('\t')[i]))

xcoords = []
for i in range(8, len(lines)):
    xcoords.append(int(lines[i].split('\t')[0]))

ycoords = []
for i in range(8, len(lines)):
    ycoords.append(int(lines[i].split('\t')[1]))

if verbose == 1:
    print('\nclient\tx\ty\tdemands')
    for i in range(len(demands)):
        if i == 0:
            print('depot', end='\t')
        else:
            print(str(i), end='\t')
        print(xcoords[i], end='\t')
        print(ycoords[i], end='\t')
        print(demands[i], end='\n')

# -------------------------------------------- Distance between two points calculator
def distance(xcoords, ycoords, i, j):
    distance = math.sqrt(((xcoords[i]-xcoords[j])**2)+((ycoords[i]-ycoords[j])**2))
    return distance

# example of use:
# print(distance(xcoords, ycoords, 1, 2))
# gives distance between clients 1 and 2


# -------------------------------------------- Get total cost of a route
def cost(xcoords, ycoords, route):
    costs = []
    costX = 0
    for i in range(len(route)-1):
        costX += distance(xcoords, ycoords, route[i], route[i+1])
        costs.append(costX)
    cost = 0
    for i in costs:
        cost += i
    return cost

# -------------------------------------------- Get cargo of a route
def cargo(demands, route):
    cargo = 0
    for i in route:
        cargo = cargo + demands[i]
    return cargo

# -------------------------------------------- Pathfinder
route = []
routecaps = []
for i in range(nbTrips):
    route.append([])
    routecaps.append(vehCap)
    route[i].append(0)
availableNodes = []
for i in range(1,len(demands)):
    availableNodes.append(i)
while len(availableNodes) > 0:



    votes = []
    for i in range(len(route)):
        vote = 0
        for j in availableNodes:
            if routecaps[i] < demands[j]:
                vote = vote + 1
        if vote == len(availableNodes):
            votes.append(1)
        else:
            votes.append(0)
    if min(votes) == 1:
        availableNodes = []



    for k in range(len(route)):
        distancesFromLatestInRoute = []
        keys = []
        values = []
        for i in availableNodes:
            distancesFromLatestInRoute.append((i,distance(xcoords, ycoords, route[k][-1], i)))
        for i in range(len(distancesFromLatestInRoute)):
            keys.append(distancesFromLatestInRoute[i][0])
        for i in range(len(distancesFromLatestInRoute)):
            values.append(distancesFromLatestInRoute[i][1])
        currentbest = 500000
        currentbestfound = 0
        for i in range(len(keys)):
            # if values[i] < currentbest and demands[keys[i]] <= routecaps[k]:
            if values[i] < currentbest and demands[keys[i]] <= routecaps[k]:
                currentbest=values[i]
                currentbestfound = 1
                # print(availableNodes)
            
        if currentbestfound == 1:
            indexOfClosest = values.index(currentbest)
            routecaps[k] = routecaps[k] - demands[keys[indexOfClosest]]
            route[k].append(keys[indexOfClosest])
            availableNodes.remove(keys[indexOfClosest])



# -------------------------------------------- Print results
print('routes:')
for i in route:
    i.append(0)
    print(i)

print('costs:')
for i in range(len(route)):
    print(cost(xcoords, ycoords, route[i]))

print('cargo:')
for i in range(len(route)):
    print(cargo(demands, route[i]))


# -------------------------------------------- Plot
temproute = route
colorsindex = 0
for i in range(len(temproute)):
    temproute[i].append(0)
    colorsindex = colorsindex + 1
    for j in range(len(temproute[i])-1):
        xstart = xcoords[temproute[i][j]]
        ystart = ycoords[temproute[i][j]]
        xend = xcoords[temproute[i][j+1]]
        yend = ycoords[temproute[i][j+1]]
        matplotlib.pyplot.plot((xstart,xend),(ystart,yend),color = colors[colorsindex])
#   for j in route[i]:
    for j in range(len(xcoords)):
        matplotlib.pyplot.text(xcoords[j]+0.3, ycoords[j]+0.3, str(j), fontsize=9)
matplotlib.pyplot.scatter(xcoords,ycoords)

matplotlib.pyplot.gca().set_aspect('equal', adjustable='box')
matplotlib.pyplot.show()