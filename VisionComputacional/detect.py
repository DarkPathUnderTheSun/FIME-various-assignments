import numpy as np
import cv2
from sys import argv

img = cv2.imread('moreshapes.jpg')
img_copy = img.copy()
img_gray = cv2.cvtColor(img_copy,cv2.COLOR_BGR2GRAY)

if argv[1] == 'circulos':
    circles = cv2.HoughCircles(img_gray,cv2.HOUGH_GRADIENT,1,20,
                         param1=60,param2=40,minRadius=5,maxRadius=0)
    circles = np.uint16(np.around(circles))
    for i in circles[0,:]:
        cv2.circle(img,(i[0],i[1]),i[2],(0,255,0),2)
    cv2.imshow('detected circles',img)
    if cv2.waitKey(0) & 0xFF == ord('q'): 
        cv2.destroyAllWindows()

if argv[1] == 'triangulos':
    _,threshold = cv2.threshold(img_gray, 110, 255, 
                            cv2.THRESH_BINARY)
    contours,_=cv2.findContours(threshold, cv2.RETR_TREE,
                                cv2.CHAIN_APPROX_SIMPLE)
    for cnt in contours :
        area = cv2.contourArea(cnt)
        if area > 400: 
            approx = cv2.approxPolyDP(cnt, 
                                      0.009 * cv2.arcLength(cnt, True), True)
            if(len(approx) == 3): 
                cv2.drawContours(img, [approx], 0, (0, 255, 0), 5)
    cv2.imshow('detected', img) 
    if cv2.waitKey(0) & 0xFF == ord('q'): 
        cv2.destroyAllWindows()

if argv[1] == 'rectangulos':
    _,threshold = cv2.threshold(img_gray, 110, 255, 
                            cv2.THRESH_BINARY)
    contours,_=cv2.findContours(threshold, cv2.RETR_TREE,
                                cv2.CHAIN_APPROX_SIMPLE)
    for cnt in contours :
        area = cv2.contourArea(cnt)
        if area > 400: 
            approx = cv2.approxPolyDP(cnt, 
                                      0.009 * cv2.arcLength(cnt, True), True)
            if(len(approx) == 4): 
                cv2.drawContours(img, [approx], 0, (0, 255, 0), 5)
    cv2.imshow('detected', img) 
    if cv2.waitKey(0) & 0xFF == ord('q'): 
        cv2.destroyAllWindows()