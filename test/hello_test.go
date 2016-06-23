package main

import (
	"test"
	"testing"
)

func TestMainReturns1(t *testing.T) {
	if test.Main() != 1 {
		t.Error("Main did not return 1")
	}
}
