**Dart basic syntax** 

````markdown
# Dart Basic Syntax

---

## 1. Comments
```dart
// Single-line comment
/* 
  Multi-line comment 
*/
/** 
  Documentation comment 
*/
````

---

## 2. Variables and Data Types

```dart
void main() {
  int age = 25;
  double height = 5.9;
  String name = "E-Jay";
  bool isStudent = true;
  var country = "Philippines"; // type inferred as String
  dynamic anything = 100; // can change type

  print("$name is $age years old from $country.");
}
```

**Common Types:** `int`, `double`, `String`, `bool`, `List`, `Map`, `Set`, `dynamic`

---

## 3. Constants

```dart
const pi = 3.14; // compile-time constant
final name = "E-Jay"; // run-time constant
```

---

## 4. Functions

```dart
// Basic function
int add(int a, int b) {
  return a + b;
}

// Arrow function
int multiply(int a, int b) => a * b;

void main() {
  print(add(2, 3));      // 5
  print(multiply(2, 3)); // 6
}
```

**Optional Parameters:**

```dart
void greet(String name, [String? title]) {
  if (title != null) {
    print("Hello $title $name");
  } else {
    print("Hello $name");
  }
}
```

**Named Parameters:**

```dart
void greetNamed({required String name, String? title}) {
  print(title != null ? "Hello $title $name" : "Hello $name");
}
```

---

## 5. Control Flow

```dart
void main() {
  int number = 10;

  // If-Else
  if (number > 0) {
    print("Positive");
  } else {
    print("Non-positive");
  }

  // Switch
  switch(number) {
    case 10:
      print("Ten");
      break;
    default:
      print("Other");
  }

  // Loops
  for(int i = 0; i < 5; i++) {
    print(i);
  }

  int j = 0;
  while(j < 5) {
    print(j);
    j++;
  }

  int k = 0;
  do {
    print(k);
    k++;
  } while(k < 5);
}
```

---

## 6. Collections

**List**

```dart
List<int> numbers = [1, 2, 3, 4];
numbers.add(5);
print(numbers[0]); // 1
```

**Set**

```dart
Set<String> fruits = {"Apple", "Banana", "Apple"}; // no duplicates
fruits.add("Orange");
print(fruits);
```

**Map**

```dart
Map<String, int> scores = {"Alice": 90, "Bob": 85};
scores["Charlie"] = 88;
print(scores["Alice"]); // 90
```

---

## 7. Null Safety

```dart
String? name; // can be null
name = "E-Jay";

int length = name!.length; // ! asserts it's not null
```

---

## 8. Classes and Objects

```dart
class Person {
  String name;
  int age;

  // Constructor
  Person(this.name, this.age);

  // Named constructor
  Person.guest() : name = "Guest", age = 0;

  void greet() {
    print("Hello, I am $name, $age years old.");
  }
}

void main() {
  Person p1 = Person("E-Jay", 25);
  p1.greet();

  Person p2 = Person.guest();
  p2.greet();
}
```

---

## 9. Inheritance

```dart
class Animal {
  void eat() => print("Animal is eating");
}

class Dog extends Animal {
  void bark() => print("Dog is barking");
}

void main() {
  Dog dog = Dog();
  dog.eat();
  dog.bark();
}
```

---

## 10. Interfaces and Abstract Classes

```dart
abstract class Shape {
  double area();
}

class Circle implements Shape {
  double radius;
  Circle(this.radius);

  @override
  double area() => 3.14 * radius * radius;
}
```

---

## 11. Exception Handling

```dart
void main() {
  try {
    int result = 12 ~/ 0; // integer division
  } catch(e) {
    print("Error: $e");
  } finally {
    print("Finally block executed");
  }
}
```

---

## 12. Async & Await

```dart
Future<String> fetchData() async {
  await Future.delayed(Duration(seconds: 2));
  return "Data fetched";
}

void main() async {
  print("Fetching...");
  String data = await fetchData();
  print(data);
}
```

---

## 13. Lambdas / Anonymous Functions

```dart
var numbers = [1,2,3];
numbers.forEach((n) => print(n));

var square = (int x) => x * x;
print(square(5)); // 25
```

---

## 14. Operators

* Arithmetic: `+ - * / ~/ % ++ --`
* Comparison: `== != > < >= <=`
* Logical: `&& || !`
* Type: `is`, `is!`
* Null-aware: `??`, `??=`, `?.`, `!..`

```dart
int? a;
int b = a ?? 10; // if a is null, use 10
```

---

## 15. Misc

* **String Interpolation:** `"$name is $age years old"`
* **Multi-line Strings:**

```dart
String text = '''
Line 1
Line 2
''';
```

* **Raw Strings:** `r"This is raw \n no newline"`