import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:get/get_core/src/get_main.dart';
import 'package:get/get_navigation/get_navigation.dart';
import 'package:new_app/screen/review_video.dart';

class video_screen extends StatelessWidget {
  const video_screen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        elevation: 0,
        backgroundColor: Colors.blueAccent,
        title: const Text(
          "New app",
          style: TextStyle(
            fontSize: 20,
            color: Colors.white,
          ),
        ),
        foregroundColor: Colors.white,
        actions: [
          IconButton(
            onPressed: () {},
            icon: const Icon(
              Icons.notifications,
            ),
          )
        ],
      ),
      body: ListView.builder(
        itemBuilder: (context, index) {
          return Padding(
            padding: const EdgeInsets.all(8.0),
            child: Container(
              decoration: BoxDecoration(
                borderRadius: BorderRadius.circular(8),
                border: Border.all(color: Colors.grey),
              ),
              child: Column(
                children: [
                  Padding(
                    padding: const EdgeInsets.all(5.0),
                    child: Container(
                      height: 60,
                      width: double.infinity,
                      child: const Row(
                        children: [
                          CircleAvatar(
                            radius: 40,
                            foregroundImage: NetworkImage(
                              'https://imgs.search.brave.com/NAxyElXHJpI2HgErqzFgzu-5U9MiSq4ygQuYlfb36zQ/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTQ2/MDgwMTg2OS9waG90/by9pbnN0YW50LXBo/b3RvLXBvcnRyYWl0/LW9mLWEteW91bmct/YnVzaW5lc3N3b21h/bi53ZWJwP2I9MSZz/PTE3MDY2N2Emdz0w/Jms9MjAmYz1rbjNM/d1FNUnNnVU1IcW5R/eURBOUliWjlreng2/XzAwQ2Fnbk04RGFK/WXpBPQ',
                            ),
                          ),
                          Text(
                            'Som veha',
                            style: TextStyle(fontSize: 17),
                          )
                        ],
                      ),
                    ),
                  ),
                  const Padding(
                    padding: EdgeInsets.all(5.0),
                    child: Text(
                      'Generally, the developer should be concerned with removing controllers from memory. With GetX this is not necessary because resources are removed from memory when they are not used by default. If you want to keep it in memory, you must explicitly declare  in your dependency. That way, in addition to saving time, you are less at risk of having unnecessary dependencies on memory. Dependency loading is also lazy by default.',
                      textAlign: TextAlign.start,
                      style: TextStyle(
                        color: Colors.black,
                        fontSize: 12,
                      ),
                      maxLines: 3, // Maximum number of lines
                      overflow: TextOverflow.ellipsis, // Overflow behavior
                    ),
                  ),
                  Padding(
                    padding: const EdgeInsets.all(8.0),
                    child: InkWell(
                      onTap: () {
                        Get.to(const review_video());
                      },
                      child: Stack(
                        children: [
                          Container(
                            height: 200,
                            width: double.infinity,
                            decoration: BoxDecoration(
                              color: Colors.amber,
                              borderRadius: BorderRadius.circular(8),
                            ),
                            child: ClipRRect(
                              borderRadius: BorderRadius.circular(8),
                              child: const Image(
                                image: NetworkImage(
                                  "https://imgs.search.brave.com/qfuO-G67MUUnmburFR-QW-SiSZr2DewKuXk169YysPc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pLnBj/bWFnLmNvbS9pbWFn/ZXJ5L2FydGljbGVz/LzAwQ3g3dkZJZXR4/Q3VLeFFlcVBmOG1p/LTIzLmZpdF9saW0u/djE2NDMxMzEyMDIu/anBn",
                                ),
                                fit: BoxFit.cover,
                              ),
                            ),
                          ),
                          Container(
                            height: 200,
                            width: double.infinity,
                            color: Colors.transparent,
                            child: const Icon(
                              Icons.play_circle_outline_outlined,
                              size: 40,
                              color: Colors.white,
                            ),
                          ),
                          Container(
                            height: 200,
                            width: double.infinity,
                            color: Colors.transparent,
                            child: Column(
                              mainAxisAlignment: MainAxisAlignment.end,
                              children: [
                                Container(
                                  height: 30,
                                  width: double.infinity,
                                  color: Colors.transparent,
                                  child: const Padding(
                                    padding: EdgeInsets.only(left: 5, right: 5),
                                    child: Row(
                                      mainAxisAlignment:
                                          MainAxisAlignment.spaceBetween,
                                      children: [
                                        Row(
                                          children: [
                                            Icon(
                                              Icons.play_arrow_sharp,
                                              color: Colors.white,
                                              size: 15,
                                            ),
                                            Text(
                                              '100k',
                                              style: TextStyle(
                                                color: Colors.white,
                                              ),
                                            )
                                          ],
                                        ),
                                        Text(
                                          '100:10',
                                          style: TextStyle(color: Colors.white),
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
                  ),
                ],
              ),
            ),
          );
        },
      ),
    );
  }
}
