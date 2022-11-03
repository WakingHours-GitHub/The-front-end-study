import cv2 as cv
import numpy as np
import time


def main() -> None:
    cap = cv.VideoCapture("./video3.mp4")  # 返回一个cap对象
    bgsubmog = cv.createBackgroundSubtractorMOG2()  # 返回对象

    while True:
        ret, frame = cap.read() # read each frame
        if ret:
            frame_gray = cv.cvtColor(frame, cv.COLOR_BGR2GRAY)
            mask = bgsubmog.apply(frame_gray)  # 处理后得到的一个掩码

            cv.imshow("img", np.hstack([frame_gray, mask]))
            cv.imshow("frame", frame)
            key = cv.waitKey(25)
            if key & 0xFF == 27:  # 27就是esc键
                break
            elif key & 0xFF == ord('t'): # 按下‘t’就在暂停。 
                time.sleep(0.5)

        else:
            print("打开失败")


    cap.release()
    cv.destroyAllWindows()




if __name__ == '__main__':
    main()