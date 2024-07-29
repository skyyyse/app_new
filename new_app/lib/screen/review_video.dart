import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:get/get_core/src/get_main.dart';
import 'package:get/get_navigation/get_navigation.dart';

class review_video extends StatelessWidget {
  const review_video({super.key});
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SingleChildScrollView(
        physics: BouncingScrollPhysics(parent: AlwaysScrollableScrollPhysics()),
        child: Container(
          child: Column(
            children: [
              Stack(
                children: [
                  Container(
                    height: 250,
                    width: double.infinity,
                    color: Colors.transparent,
                    child: Padding(
                      padding: const EdgeInsets.only(top: 50),
                      child: Container(
                        height: 200,
                        width: double.infinity,
                        color: Colors.amber,
                      ),
                    ),
                  ),
                  Padding(
                    padding: const EdgeInsets.only(top: 50),
                    child: Container(
                      height: 50,
                      width: double.infinity,
                      color: Colors.transparent,
                      child: Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: [
                          IconButton(
                            onPressed: () {
                              Get.back();
                            },
                            icon: Icon(
                              Icons.arrow_back,
                            ),
                          ),
                          IconButton(
                            onPressed: () {},
                            icon: Icon(
                              Icons.more_horiz_rounded,
                            ),
                          ),
                        ],
                      ),
                    ),
                  ),
                ],
              ),
              Padding(
                padding: const EdgeInsets.all(5.0),
                child: Container(
                  width: double.infinity,
                  child: Column(
                    children: [
                      Container(
                        height: 60,
                        width: double.infinity,
                        child: const Row(
                          children: [
                            CircleAvatar(
                              radius: 20,
                              foregroundImage: NetworkImage(
                                'https://imgs.search.brave.com/NAxyElXHJpI2HgErqzFgzu-5U9MiSq4ygQuYlfb36zQ/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTQ2/MDgwMTg2OS9waG90/by9pbnN0YW50LXBo/b3RvLXBvcnRyYWl0/LW9mLWEteW91bmct/YnVzaW5lc3N3b21h/bi53ZWJwP2I9MSZz/PTE3MDY2N2Emdz0w/Jms9MjAmYz1rbjNM/d1FNUnNnVU1IcW5R/eURBOUliWjlreng2/XzAwQ2Fnbk04RGFK/WXpBPQ',
                              ),
                            ),
                            Padding(
                              padding: EdgeInsets.only(left: 20),
                              child: Text(
                                'Som veha',
                                style: TextStyle(fontSize: 17),
                              ),
                            )
                          ],
                        ),
                      ),
                      Text(
                        'Generally, the developer should be concerned with removing controllers from memory. With GetX this is not necessary because resources are removed from memory when they are not used by default. If you want to keep it in memory, you must explicitly declare  in your dependency. That way, in addition to saving time, you are less at risk of having unnecessary dependencies on memory. Dependency loading is also lazy by default.',
                        textAlign: TextAlign.start,
                        style: TextStyle(
                          color: Colors.black,
                          fontSize: 12,
                        ),
                        maxLines: 5, // Maximum number of lines
                        overflow: TextOverflow.ellipsis, // Overflow behavior
                      ),
                    ],
                  ),
                ),
              ),
              Padding(
                padding: const EdgeInsets.only(right: 30, left: 30, top: 20),
                child: Container(
                  width: double.infinity,
                  // color: Colors.black,
                  child: Column(
                    children: [
                      Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: [
                          Column(
                            children: [
                              Icon(
                                Icons.thumb_up,
                                color: Colors.black,
                              ),
                              Text(
                                '100',
                                style: TextStyle(
                                  color: Colors.black,
                                ),
                              )
                            ],
                          ),
                          Column(
                            children: [
                              Icon(
                                Icons.thumb_down,
                                color: Colors.black,
                              ),
                              Text(
                                '100',
                                style: TextStyle(color: Colors.black),
                              )
                            ],
                          ),
                          Column(
                            children: [
                              Icon(
                                Icons.chat,
                                color: Colors.black,
                              ),
                              Text(
                                '100',
                                style: TextStyle(color: Colors.black),
                              )
                            ],
                          ),
                          Column(
                            children: [
                              Icon(
                                Icons.save_rounded,
                                color: Colors.black,
                              ),
                              Text(
                                'Save',
                                style: TextStyle(color: Colors.black),
                              )
                            ],
                          ),
                          InkWell(
                            onTap: () {
                              checkout();
                            },
                            child: Column(
                              children: [
                                Icon(
                                  Icons.share,
                                  color: Colors.black,
                                ),
                                Text(
                                  'share',
                                  style: TextStyle(color: Colors.black),
                                )
                              ],
                            ),
                          ),
                        ],
                      ),
                    ],
                  ),
                ),
              ),
              Padding(
                padding: const EdgeInsets.all(8.0),
                child: Container(
                  height: 100,
                  width: double.infinity,
                  decoration: BoxDecoration(
                    color: Colors.red,
                    borderRadius: BorderRadius.circular(8),
                  ),
                ),
              ),
              Padding(
                padding: const EdgeInsets.all(8.0),
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.start,
                  children: [
                    Text('More Video'),
                  ],
                ),
              ),
              for (int i = 0; i < 10; i++)
                Container(
                  height: 120,
                  width: double.infinity,
                  child: Row(
                    children: [
                      Padding(
                        padding: const EdgeInsets.all(8.0),
                        child: Stack(
                          children: [
                            Container(
                              width: 180,
                              decoration: BoxDecoration(
                                borderRadius: BorderRadius.circular(8),
                                color: const Color.fromARGB(255, 37, 30, 30),
                              ),
                              child: ClipRRect(
                                borderRadius: BorderRadius.circular(8),
                                child: Image(
                                  image: NetworkImage(
                                    "https://imgs.search.brave.com/qfuO-G67MUUnmburFR-QW-SiSZr2DewKuXk169YysPc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pLnBj/bWFnLmNvbS9pbWFn/ZXJ5L2FydGljbGVz/LzAwQ3g3dkZJZXR4/Q3VLeFFlcVBmOG1p/LTIzLmZpdF9saW0u/djE2NDMxMzEyMDIu/anBn",
                                  ),
                                  fit: BoxFit.cover,
                                ),
                              ),
                            ),
                            Container(
                              height: 120,
                              width: 180,
                              decoration: BoxDecoration(
                                borderRadius: BorderRadius.circular(8),
                                color: Colors.transparent,
                              ),
                              child: Icon(
                                Icons.play_circle_outline_outlined,
                                size: 40,
                                color: Colors.white,
                              ),
                            ),
                            Container(
                              height: 120,
                              width: 180,
                              decoration: BoxDecoration(
                                borderRadius: BorderRadius.circular(8),
                                color: Colors.transparent,
                              ),
                              child: Column(
                                mainAxisAlignment: MainAxisAlignment.end,
                                children: [
                                  Container(
                                    height: 30,
                                    width: double.infinity,
                                    color: Colors.transparent,
                                    child: Padding(
                                      padding: const EdgeInsets.only(
                                          left: 5, right: 5),
                                      child: Row(
                                        mainAxisAlignment:
                                            MainAxisAlignment.spaceBetween,
                                        children: [
                                          Text(
                                            '10:10mn',
                                            style:
                                                TextStyle(color: Colors.white),
                                          )
                                        ],
                                      ),
                                    ),
                                  ),
                                ],
                              ),
                            ),
                          ],
                        ),
                      ),
                      Expanded(
                        child: Padding(
                          padding: const EdgeInsets.only(
                              top: 8, right: 8, bottom: 8),
                          child: Container(
                            child: Text(
                                'Generally, the developer should be concerned with removing controllers from memory. With GetX this is not necessary because resources are removed from memory when they are not used by default. If you want to keep it in memory, you must explicitly declare  in your dependency. That way, in addition to saving time, you are less at risk of having unnecessary dependencies on memory. Dependency loading is also lazy by default.'),
                          ),
                        ),
                      ),
                    ],
                  ),
                ),
            ],
          ),
        ),
      ),
    );
  }

  void checkout() {
    Get.bottomSheet(
      Container(
        height: 400,
        width: double.infinity,
        color: Colors.white,
        child: Column(
          children: [
            // Row(
            //   children: [

            //   ],
            // ),
          ],
        ),
      ),
    );
  }
}
