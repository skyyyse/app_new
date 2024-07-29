import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:get/get_core/src/get_main.dart';


class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'TikTok Style Bottom Sheet',
      home: Scaffold(
        appBar: AppBar(
          title: Text('TikTok Style Bottom Sheet'),
        ),
        body: Center(
          child: ElevatedButton(
            onPressed: () {
              _showBottomSheet();
            },
            child: Text('Show Bottom Sheet'),
          ),
        ),
      ),
    );
  }

  void _showBottomSheet() {
    Get.bottomSheet(
      BottomSheetWidget(),
      enableDrag: true,
    );
  }
}

class BottomSheetWidget extends StatelessWidget {
  final List<String> items = List.generate(20, (index) => 'Comment $index');
  final TextEditingController _controller = TextEditingController();

  @override
  Widget build(BuildContext context) {
    return Container(
      padding: const EdgeInsets.only(top: 16, left: 16, right: 16),
      decoration: BoxDecoration(
        color: Colors.white,
        borderRadius: BorderRadius.vertical(top: Radius.circular(16)),
      ),
      child: Column(
        mainAxisSize: MainAxisSize.min,
        children: [
          // Header section
          Row(
            mainAxisAlignment: MainAxisAlignment.spaceBetween,
            children: [
              Text(
                'Comments',
                style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
              ),
              IconButton(
                icon: Icon(Icons.close),
                onPressed: () {
                  Navigator.pop(context);
                },
              ),
            ],
          ),
          Divider(),
          // List of items (comments)
          Expanded(
            child: ListView.builder(
              itemCount: items.length,
              itemBuilder: (context, index) {
                return ListTile(
                  title: Text(items[index]),
                  onTap: () {
                    // Handle item tap (optional)
                    ScaffoldMessenger.of(context).showSnackBar(
                      SnackBar(content: Text('Tapped on ${items[index]}')),
                    );
                  },
                );
              },
            ),
          ),
          // Text field for adding comments
          Padding(
            padding: const EdgeInsets.only(bottom: 8.0),
            child: Row(
              children: [
                Expanded(
                  child: TextField(
                    controller: _controller,
                    decoration: InputDecoration(
                      hintText: 'Add a comment...',
                      prefixIcon: Icon(Icons.send),
                      border: OutlineInputBorder(
                        borderRadius: BorderRadius.circular(8.0),
                        borderSide: BorderSide(color: Colors.grey),
                      ),
                      filled: true,
                      fillColor: Colors.grey.shade200,
                    ),
                  ),
                ),
                IconButton(
                  onPressed: () {
                    // Handle send button press
                    if (_controller.text.isNotEmpty) {
                      ScaffoldMessenger.of(context).showSnackBar(
                        SnackBar(content: Text('Comment sent: ${_controller.text}')),
                      );
                      _controller.clear(); // Clear the TextField after sending
                    }
                  },
                  icon: Icon(Icons.send, color: Colors.blue),
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }
}
