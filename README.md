# Getting started

Integrate Gympass Booking API in easy way.


## Installation

The Gympass PHP SDK can be installed with Composer. Run this command:

```
composer require vitorbritto/gympass-sdk-php
```

## Usage

### Authentication
In order to setup authentication and initialization of the API client, you need the following information.

| Parameter | Description |
|-----------|-------------|
| oAuthAccessToken | OAuth 2.0 Access Token |


API client can be initialized as following.

```php
$oAuthAccessToken = 'oAuthAccessToken'; // OAuth 2.0 Access Token

$client = new GympassAPILib\GympassAPIClient($oAuthAccessToken);
```


# Class Reference

## <a name="summary"></a>List of Controllers

* [ClassesController](#classes)
* [SlotsController](#slots)
* [BookingsController](#bookings)

## <a name="classes"></a>![Class: ](https://apidocs.io/img/class.png ".ClassesController") ClassesController

### Get singleton instance

The singleton instance of the ``` ClassesController ``` class can be accessed from the API Client.

```php
$classes = $client->getClasses();
```

### <a name="create"></a>![Method: ](https://apidocs.io/img/method.png ".ClassesController.create") create

> Creates a list of classes on a given gym.


```php
function create(
        $gymId,
        $payload)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| gymId |  ``` Required ```  ``` DefaultValue ```  | The identifier of the gym at Gympass. Provided by Gympass. |
| payload |  ``` Required ```  | Payload for creating classes. |



#### Example Usage

```php
$gymId = '1';
$payload = new Classes();

$result = $classes->create($gymId, $payload);

```


### <a name="mlist"></a>![Method: ](https://apidocs.io/img/method.png ".ClassesController.mlist") mlist

> Get a list of classes on a given gym.


```php
function mlist($gymId)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| gymId |  ``` Required ```  ``` DefaultValue ```  | The identifier of the gym at Gympass. Provided by Gympass. |



#### Example Usage

```php
$gymId = '1';

$result = $classes->mlist($gymId);

```


### <a name="get_view"></a>![Method: ](https://apidocs.io/img/method.png ".ClassesController.getView") getView

> TODO: Add a method description


```php
function getView(
        $gymId,
        $classId)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| gymId |  ``` Required ```  ``` DefaultValue ```  | The identifier of the gym at Gympass. Provided by Gympass. |
| classId |  ``` Required ```  ``` DefaultValue ```  | The identifier of the class at Gympass. Returned when create a Class. |



#### Example Usage

```php
$gymId = '1';
$classId = '1';

$result = $classes->getView($gymId, $classId);

```


### <a name="update"></a>![Method: ](https://apidocs.io/img/method.png ".ClassesController.update") update

> TODO: Add a method description


```php
function update(
        $gymId,
        $classId,
        $payload)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| gymId |  ``` Required ```  ``` DefaultValue ```  | The identifier of the gym at Gympass. Provided by Gympass. |
| classId |  ``` Required ```  ``` DefaultValue ```  | The identifier of the class at Gympass. Returned when create a Class. |
| payload |  ``` Required ```  | Payload for updating a class. |



#### Example Usage

```php
$gymId = '1';
$classId = '1';
$payload = new MClass();

$result = $classes->update($gymId, $classId, $payload);

```


[Back to List of Controllers](#list_of_controllers)

## <a name="slots"></a>![Class: ](https://apidocs.io/img/class.png ".SlotsController") SlotsController

### Get singleton instance

The singleton instance of the ``` SlotsController ``` class can be accessed from the API Client.

```php
$slots = $client->getSlots();
```

### <a name="create"></a>![Method: ](https://apidocs.io/img/method.png ".SlotsController.create") create

> TODO: Add a method description


```php
function create(
        $gymId,
        $classId,
        $payload)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| gymId |  ``` Required ```  ``` DefaultValue ```  | The identifier of the gym at Gympass. Provided by Gympass. |
| classId |  ``` Required ```  ``` DefaultValue ```  | The identifier of the class at Gympass. Returned when create a Class. |
| payload |  ``` Required ```  | Payload for creating a class |



#### Example Usage

```php
$gymId = '1';
$classId = '1';
$payload = new Slot();

$result = $slots->create($gymId, $classId, $payload);

```


### <a name="get_view"></a>![Method: ](https://apidocs.io/img/method.png ".SlotsController.getView") getView

> TODO: Add a method description


```php
function getView(
        $gymId,
        $classId,
        $slotId)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| gymId |  ``` Required ```  ``` DefaultValue ```  | The identifier of the gym at Gympass. Provided by Gympass. |
| classId |  ``` Required ```  ``` DefaultValue ```  | The identifier of the class at Gympass. Returned when create a Class. |
| slotId |  ``` Required ```  ``` DefaultValue ```  | The identifier of the Slot at Gympass. Returned when create a Slot. |



#### Example Usage

```php
$gymId = '1';
$classId = '1';
$slotId = '1';

$result = $slots->getView($gymId, $classId, $slotId);

```


### <a name="mlist"></a>![Method: ](https://apidocs.io/img/method.png ".SlotsController.mlist") mlist

> TODO: Add a method description


```php
function mlist(
        $gymId,
        $classId,
        $from,
        $to)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| gymId |  ``` Required ```  ``` DefaultValue ```  | The identifier of the gym at Gympass. Provided by Gympass. |
| classId |  ``` Required ```  ``` DefaultValue ```  | The identifier of the class at Gympass. Returned when create a Class. |
| from |  ``` Required ```  | timezoned date/time to start find slots. It should be entered based on the location of the gym. |
| to |  ``` Required ```  | timezoned date/time to start find slots. It should be entered based on the location of the gym. |



#### Example Usage

```php
$gymId = '1';
$classId = '1';
$from = 'From';
$to = 'To';

$result = $slots->mlist($gymId, $classId, $from, $to);

```


### <a name="delete"></a>![Method: ](https://apidocs.io/img/method.png ".SlotsController.delete") delete

> TODO: Add a method description


```php
function delete(
        $gymId,
        $classId,
        $slotId)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| gymId |  ``` Required ```  ``` DefaultValue ```  | The identifier of the gym at Gympass. Provided by Gympass. |
| classId |  ``` Required ```  ``` DefaultValue ```  | The identifier of the class at Gympass. Returned when create a Class. |
| slotId |  ``` Required ```  ``` DefaultValue ```  | The identifier of the Slot at Gympass. Returned when create a Slot. |



#### Example Usage

```php
$gymId = '1';
$classId = '1';
$slotId = '1';

$slots->delete($gymId, $classId, $slotId);

```


### <a name="create_patch"></a>![Method: ](https://apidocs.io/img/method.png ".SlotsController.createPatch") createPatch

> TODO: Add a method description


```php
function createPatch(
        $gymId,
        $classId,
        $slotId,
        $payload)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| gymId |  ``` Required ```  ``` DefaultValue ```  | The identifier of the gym at Gympass. Provided by Gympass. |
| classId |  ``` Required ```  ``` DefaultValue ```  | The identifier of the class at Gympass. Returned when create a Class. |
| slotId |  ``` Required ```  ``` DefaultValue ```  | The identifier of the Slot at Gympass. Returned when create a Slot. |
| payload |  ``` Required ```  | Payload for updating slot limits. |



#### Example Usage

```php
$gymId = '1';
$classId = '1';
$slotId = '1';
$payload = new SlotLimits();

$result = $slots->createPatch($gymId, $classId, $slotId, $payload);

```


### <a name="update"></a>![Method: ](https://apidocs.io/img/method.png ".SlotsController.update") update

> TODO: Add a method description


```php
function update($payload)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| payload |  ``` Required ```  | Payload for creating a slot. |



#### Example Usage

```php
$payload = new Slot();

$result = $slots->update($payload);

```


[Back to List of Controllers](#list_of_controllers)

## <a name="bookings"></a>![Class: ](https://apidocs.io/img/class.png ".BookingsController") BookingsController

### Get singleton instance

The singleton instance of the ``` BookingsController ``` class can be accessed from the API Client.

```php
$bookings = $client->getBookings();
```

### <a name="update"></a>![Method: ](https://apidocs.io/img/method.png ".BookingsController.update") update

> TODO: Add a method description


```php
function update(
        $gymId,
        $bookingNumber,
        $payload)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| gymId |  ``` Required ```  ``` DefaultValue ```  | The identifier of the gym at Gympass. Provided by Gympass. |
| bookingNumber |  ``` Required ```  ``` DefaultValue ```  | The booking identifier at Gympass. Returned when create a Boooking. |
| payload |  ``` Required ```  | Payload for updating a booking. |



#### Example Usage

```php
$gymId = '1';
$bookingNumber = '1';
$payload = new Booking();

$result = $bookings->update($gymId, $bookingNumber, $payload);

```


[Back to Summary](#summary)



