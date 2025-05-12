import cv2
import numpy as np
import json
import sys

video_path = sys.argv[1]
cap = cv2.VideoCapture(video_path)
ret, frame = cap.read()
cap.release()

if not ret:
    print(json.dumps({"error": "Failed to read frame"}))
    sys.exit(1)

gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
edges = cv2.Canny(gray, 100, 200)
height, width = gray.shape
roi = edges[int(height * 0.75):, int(width * 0.75):]

_, thresh = cv2.threshold(roi, 50, 255, cv2.THRESH_BINARY)
contours, _ = cv2.findContours(thresh, cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_SIMPLE)
contours = sorted(contours, key=cv2.contourArea, reverse=True)
largest = contours[0] if contours else None

if largest is not None:
    x, y, w, h = cv2.boundingRect(largest)
    x += int(width * 0.75)
    y += int(height * 0.75)
    print(json.dumps({"x": x, "y": y, "w": w, "h": h}))
else:
    print(json.dumps({"error": "No watermark detected"}))
