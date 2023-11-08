<?php
namespace Etg24\App\Utility;

/**
 * This class is meant for set operations with scalar elements
 */
class ScalarSetUtility {

	/**
	 * Returns a set containing the elements of all provided sets
	 *
	 * @param scalar[][] ...$sets
	 * @return scalar[]
	 */
	public static function union(...$sets) {
		$resultSet = [];

		foreach ($sets as $set) {
			foreach ($set as $element) {
				if (!in_array($element, $resultSet)) {
					$resultSet[] = $element;
				}
			}
		}

		return $resultSet;
	}

	/**
	 * Returns a set containing the elements that are in setA and setB
	 *
	 * @param scalar[][] $sets
	 * @return scalar[]
	 */
	public static function intersection(...$sets) {
        $resultSet = current($sets);

        foreach ($sets as $set) {
            foreach ($resultSet as $key=>$element) {
                if (!in_array($element, $set)) {
                    unset($resultSet[$key]);
                }
            }
        }

		return $resultSet;
	}

    /**
    * Returns true if all the sets have the same elements, false otherwise
    *
    * @param scalar[][] ...$sets
    * @return boolean
    */
    public static function isIdentical(...$sets) {
        $resultingSet = self::symmetricDifference($sets);
        return (count($resultingSet) === 0);
    }

	/**
	 * Shortcut function for checking if the intersection of setA and setB is empty
	 *
	 * @param array $setA
	 * @param array $setB
	 * @return boolean
	 */
	public static function hasIntersection(array $setA, array $setB) {
		return count(self::intersection($setA, $setB)) > 0;
	}

	/**
	 * Returns a set containing the elements that are in setA but not in setB
	 *
	 * @param scalar[] $setA
	 * @param scalar[] $setB
	 * @return scalar[]
	 */
	public static function remove(array $setA, array $setB) {
		$resultSet = [];

		foreach ($setA as $element) {
			if (!in_array($element, $setB)) {
				$resultSet[] = $element;
			}
		}

		return $resultSet;
	}

	/**
	 * Returns a set containing the elements that are not included in every set
	 *
	 * @param scalar[][] ...$sets
	 * @return scalar[]
	 */
	public static function symmetricDifference(...$sets) {
		$resultSet = [];

		foreach ($sets as $set) {
			$temporaryResultSet = [];

			foreach ($set as $element) {
				if (!in_array($element, $resultSet)) {
					$temporaryResultSet[] = $element;
				}
			}
			foreach ($resultSet as $element) {
				if (!in_array($element, $set)) {
					$temporaryResultSet[] = $element;
				}
			}

			$resultSet = $temporaryResultSet;
		}

		return $resultSet;
	}

}
